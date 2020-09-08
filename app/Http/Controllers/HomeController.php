<?php

namespace App\Http\Controllers;

use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $transaksi = DB::table('transaksis')
            ->join('tikets', 'tikets.id', '=', 'transaksis.id_tiket')
            ->join('kategoris', 'kategoris.id', '=', 'tikets.id_kategori')
            ->where('status', '=', 1)
            ->get();
        $count = Transaksi::all();
        return view('home',compact('transaksi','count'));
    }
}
