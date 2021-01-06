<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Initialize
    protected $fillable = [
        'nama_barang', 'berat_barang', 'harga', 'keterangan',
    ];
}