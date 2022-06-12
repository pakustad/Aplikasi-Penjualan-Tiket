<?php

namespace App\Http\Controllers;

use App\Transaksi;
use Fpdf;
use App\Exports\TransaksiExports;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::where('status', '0')->get();
        return view('transaksi.index', compact('transaksi'));
    }

    public function create()
    {
        // Create unique code
        $code = uniqid("inv-") . "-" . time();
        Session::put("transactionCode", $code);
        return redirect("transaksi/new");
    }

    public function new()
    {
        echo Session::get("transactionCode");
    }

    public function checkout()
    {
        Session::forget("transactionCode");
    }

    public function store(Request $request)
    {
        $request->validate([
            'qty' => 'required'
        ]);
        Transaksi::create($request->except('submit'));
        return redirect('transaksi')->with('pesan', 'berhasil menambahkan data.');
    }

    public function destroy($id)
    {
        Transaksi::findOrFail($id)->delete();
        return redirect('transaksi')->with('pesan', 'berhasil dicancel.');
    }

    public function update()
    {
        $transaksi = Transaksi::where('status', '0');
        $transaksi->update(['status' => '1']);
        return redirect()->back();
    }

    public function laporan()
    {
        $pdf = new Fpdf("L", "cm", "A4");
        $pdf::AddPage();
        $pdf::SetFont('Arial', 'B', 12);
        $pdf::Cell(185, 7, 'Laporan Penjualan Tiket', 0, 1, 'C');
        $pdf::SetFont('Arial', '', 10);
        $pdf::Cell(185, 5, 'Taman Rekreasi Cimalati Sukabumi', 0, 1, 'C');
        $pdf::SetFont('Arial', '', 10);
        $pdf::Cell(185, 5, "Jl. Cimalati, Cicurug, Kab. Sukabumi, Jawa Barat", 0, 1, 'C');
        $pdf::Line(10, 30, 190, 30);
        $pdf::Line(10, 31, 190, 31);
        $pdf::Cell(30, 10, '', 0, 1);
        $pdf::SetFont('Arial', 'B', 12);
        $pdf::Cell(185, 5, 'Penjualan Tiket', 0, 0, 'C');
        $pdf::Cell(30, 10, '', 0, 1);
        $pdf::Cell(60, 7, 'Nama Tiket', 1, 0);
        $pdf::Cell(25, 7, 'Qty', 1, 0);
        $pdf::Cell(40, 7, 'Harga Tiket', 1, 0);
        $pdf::Cell(38, 7, 'Subtotal', 1, 0);
        $pdf::Cell(30, 7, 'Tanggal', 1, 1);

        $transaksi = Transaksi::where('status', '1')->get();
        foreach ($transaksi as $item) {
            $pdf::Cell(60, 7, $item->tiket->name_tiket, 1, 0);
            $pdf::Cell(25, 7, $item->qty, 1, 0);
            $pdf::Cell(40, 7, $item->tiket->harga_tiket, 1, 0);
            $pdf::Cell(38, 7, $item->tiket->harga_tiket * $item->qty, 1, 0);
            $pdf::Cell(30, 7, \Carbon\Carbon::parse($item->created_at)->formatLocalized('%d %b %Y'), 1, 1);
        }

        $pdf::Output();
        exit;
    }

    public function excel()
    {
        libxml_use_internal_errors(true);
        return (new TransaksiExports)->download('penjualan_tiket.xlsx');
    }
}
