<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = ["id", "created_at", "updated_at"];

    public function transactionDetails()
    {
        return $this->hasMany("App\TransactionDetail");
    }
}
