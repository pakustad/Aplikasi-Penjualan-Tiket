<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaksi extends Model
{
    protected $guarded = [];

    public function tiket()
    {
        return $this->belongsTo(Tiket::class, 'id_tiket');
    }

    public function checkout($code)
    {
        $transactions = DB::table("transaksis")->where("code", $code)->select("id")->get();
        foreach ($transactions as $transaction) {
            DB::table("transaksis")->where("id", $transaction->id)->update(["status" => 1]);
        }
    }

    public static function generateCode()
    {
        $test = DB::table("transaksis")->where("YEAR(created_at)", 2022)->get();
        dd($test);
    }
}
