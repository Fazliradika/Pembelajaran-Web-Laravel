<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stok extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'toko_id',
        'jumlah_stok',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function toko()
    {
        return $this->belongsTo(Toko::class);
    }
}
