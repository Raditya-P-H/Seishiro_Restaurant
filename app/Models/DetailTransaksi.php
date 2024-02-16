<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    public function transaksi() {

        return $this->belongsTo(transaksi::class);
    }
    public function user() {
        return $this->belongsTo(user::class);
    }
    public function menu() {
        return $this->belongsTo(menu::class);
    }
}
