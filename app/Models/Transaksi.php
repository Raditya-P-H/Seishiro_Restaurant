<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    public function detailtransaksi() {
        return $this->hasMany(detailtransaksi::class);
    }
    public function user() {
        return $this->belongsTo(user::class);
    }
}
