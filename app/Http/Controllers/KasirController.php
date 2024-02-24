<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Str;
use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Log as Log;

class KasirController extends Controller
{
    public function konfirbayar(Request $request)
    {
        $detailtransaksi = DetailTransaksi::where('status', 'Pesanan di Proses')->get();
        $detailtransaksi = $detailtransaksi->groupBy('no_meja');
        return view('kasir.konfirbayar', compact('detailtransaksi'));
    }

    public function prosesbayar(Request $request)
    {
        // Ambil data dari Form Input
        $no_meja = $request->input('no_meja');
        $nama_pelanggan = $request->input('nama_pelanggan');
        $totalharga = $request->input('totalharga');
        $uang_bayar = $request->input('uang_bayar');

        // Buat transaksi baru
        $transaksi = new Transaksi();
        $transaksi->user_id = Auth::id();
        $transaksi->kode = 'INV' .String::random(8);
        $transaksi->nama_pelanggan = $nama_pelanggan;
        $transaksi->totalharga = $totalharga;
        $transaksi->uang_bayar = $uang_bayar;
        $transaksi->uang_kembali = $uang_bayar - $totalharga;
        $transaksi->save();

        //Ubah Status
        DetailTransaksi::where('no_meja', $no_meja)
        ->whereNull('transaksi_id')
        ->update(['status'=> 'pending', 'transaski_id' => $transaksi->id]);

        Log::create([
            'user_id'=> auth()->id(),
            'activity'=>'kasir konfirmasi pembayaran',
        ]);
        return redirect()->route('summary')->with('status', 'Berhasil Transaksi');
    }

    public function summary(DetailTransaksi $detailtransaksi)
    {
        $detailtransaksi = DetailTransaksi::where('status', 'pending')->get();
        $detailtransaski = $detailtransaksi->groupBy('transaksi_id');
        return view('kasir.summary', compact('detailtransaksi'));
    }

    public function tampildetailsummary($transaksi_id)
    {
        $detailtransaksi = DetailTransaksi::where('transaksi_id', $transaksi_id)->where('status', 'pending')->get();
        $transaksi = Transaksi::find($transaksi_id);
        $totalharga = $detailtransaksi->sum(function ($detailtransaksi){
            return $detailtransaksi->totalharga;
        });
        return view('kasir.detailsummary', compact('detailtransaksi', 'totalharga', 'transaksi'));
    }

    public function printStruk($transaksi_id)
    {
        $detailtransaksi = DetailTransaksi::where('transaksi_id', $transaksi_id)->get();
        $totalharga = $detailtransaksi->sum('totalharga');
        $transaksi = Transaksi::findOrFail($transaksi_id);

        $pdf = Facade::loadView('kasir.struk', compact('transaksi', 'detailtransaksi', 'totalharga'));
        return $pdf->download('struk.pdf');
    }

    public function statusmeja()
    {
      $users = User::where('role', 'user')->get();
      return view('kasir.statusmeja', ['users' => $users]);
    }

    public function konfiselesai($transaksi_id)
    {
        $detailtransaksi = detailtransaksi::where('transaksi_id', $transaksi_id);
        $detailtransaksi->update(['status'=> 'selesai']);
        return redirect()->back()->with('status', 'Transaksi Selesai Dikonfirmasi!');
    }

    public function hapustransaksi($no_meja)
    {
        $detailtransaksi = detailtransaksi::where('no_meja', $no_meja)->where('status', 'Pesanan Di Proses!');
        $detailtransaksi->delete();
        return redirect()->back()->with('status', 'Transaksi Terhapus!');
    }
}
