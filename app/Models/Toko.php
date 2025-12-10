<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Toko extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_toko',
        'alamat',
        'telepon',
        'email',
    ];

    public function stoks()
    {
        return $this->hasMany(Stok::class);
    }
}
