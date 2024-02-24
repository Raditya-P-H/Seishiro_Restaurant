<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Menu;
use App\Models\Restaurant;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function login() {
        return view('login');
    }

    function postlogin(Request $request) {
        $cek = $request ->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        if(Auth::attempt($cek)){
            $user = auth()->user();
            if($user->role == 'user'){
                return redirect()->route('homeuser')->with('status', 'Selamat Datang ' .$user->name);
            }elseif($user->role == 'admin'){
                return redirect()->route('homeadmin')->with('status', 'Selamat Datang ' .$user->name);
            }elseif($user->role == 'kasir'){
                return redirect()->route('konfirbayar')->with('status', 'Selamat Datang ' .$user->name);
            }elseif($user->role == 'owner'){
                return redirect()->route('summary')->with('status', 'Selamat Datang ' .$user->name);
            }else {
                return redirect()->route('homeuser');
            }
            return redirect()->route('login')->with('status', 'email atau password salah');
        }

    }

    public function logout() {
        auth()->logout();
        return redirect()->route('login');
    }

    public function homeuser() {
        $menu= Menu::all();
        return view('homeuser', compact('menu'));
    }
    public function detailpesanan(Menu $menu) {
        return view('user.detailpesanan', compact('menu'));
    }

    public function postpesanan(Request $request, Menu $menu, Transaksi $transaksi) {
        $request->validate([
            'banyak'=>'required',
            'catatan'=>'required',
            'no_meja'=>'required',
        ]);

        DetailTransaksi::create([
            'user_id'=>Auth::id(),
            'menu_id'=>$menu->id,
            'qty'=>$request->banyak,
            'status'=>'masuk keranjang',
            'totalharga'=>$menu->harga*$request->banyak,
            'catatan'=>$request->catatan,
            'no_meja'=>$request->no_meja,
        ]);

        return redirect()->route('keranjang')->with('status', 'berhasil masuk keranjang');
    }

    public function keranjang(Request $request){
        $detailtransaksi = DetailTransaksi::where('user_id', auth()->id())->where('status', 'masuk keranjang')->get();
        $totalharga = $detailtransaksi->sum(function ($detailtransaksi){
            return $detailtransaksi->totalharga;
        });
        return view('user.keranjang', compact('detailtransaksi', 'totalharga'));
    }

    public function riwayat() {
        $detailtransaksi = DetailTransaksi::where('user_id', auth()->id())->where('status', 'pesanan di proses')->get();
        return view('user.riwayat', compact('detailtransaksi'));
    }

    public function checkout(Request $request)
    {
        $detailtransaksi = detailtransaksi::where('user_id', auth()->id())->where('status','masuk keranjang')->get();

        foreach ($detailtransaksi as $detailtransaksi) {
            $detailtransaksi->update([
                'status'=>'pesanan di proses',
            ]);

        }

        log::create([
            'user_id'=>Auth::id(),
            'activity'=>'user konfirmasi pesanan'
        ]);

        return redirect()->route('riwayat')->with('status','Pesanan terbuat.Mohon tunggu di meja anda.');
    }

    public function hapuspesanan($id)
    {
        $detailtransaksi = detailtransaksi::findOrFail($id);
        $detailtransaksi->delete();
        return redirect()->route('keranjang')->with('status','pesanan terhapus');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $menu = menu::where('name', 'LIKE', "%$keyword%")->get();

        return view('homeuser', compact('menu'));
    }

}


