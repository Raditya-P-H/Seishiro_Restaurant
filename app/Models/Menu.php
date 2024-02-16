<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected  $guarded = ['id'];

    public function kategori() {
        return $this->belongsTo(kategori::class);
    }

    function user() {
        return $this->belongsTo(User::class);
    }
}
