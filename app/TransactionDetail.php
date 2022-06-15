<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $guarded = ["id"];

    public function tiket()
    {
        return $this->hasOne("App\Tiket", "id", "ticket_id");
    }
}
