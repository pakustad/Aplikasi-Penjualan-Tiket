<?php

namespace App\Exports;

use App\Transaksi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class TransaksiExports implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    public function view():view
    {

        return view('transaksi.report',[
            'transaksi' => Transaksi::all()
        ]);
    }
}
