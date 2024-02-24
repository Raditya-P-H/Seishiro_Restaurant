<?php

namespace App\Http\Controllers;

use App\Models\detailtransaksi;
use App\Models\log;
use App\Models\menu;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\Facade\Pdf;

class OwnerController extends Controller
{
    public function cektransaksi(DetailTransaksi $detailtransaksi, Menu $menu)
    {
        $transaksi = transaksi::all();
        $totalharga = $transaksi->sum(function ($transaksi){
            return $transaksi->totalharga;
        });
        return view('owner.cektransaksi', compact('detailtransaksi', 'transaksi', 'menu', 'totalharga'));
    }

    public function filtering(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $transaksi = transaksi::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->get();
        $totalharga = $transaksi->sum(function ($transaksi){
            return $transaksi->totalharga;
        });
        return view('owner.cektransaksi', compact('transaksi', 'totalharga'));
    }

    public function downloadtransaksi(Request $request, Transaksi $transaksi)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $start_date = date('Y-m-d 00:00:00', strtotime($start_date));
        $end_date = date('Y-m-d 23:59:59', strtotime($end_date));

        $transaksi = transaksi::whereBetween('created_at', [$start_date, $end_date])->get();
        $totalharga = $transaksi->sum(function ($transaksi){
            return $transaksi->totalharga;
        });

        $pdf = PDF::loadView('transaksi', compact('transaksi', 'totalharga'));
        return $pdf->download('transaksi.pdf');
    }
}
