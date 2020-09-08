<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class,'id_kategori');
    }
}
