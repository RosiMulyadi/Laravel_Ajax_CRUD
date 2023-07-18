<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = "food";
    protected $primarykey = "id";
    protected $fillable = [
        'kode_makanan',
        'nama_makanan',
        'harga',
        'deskripsi',
    ];

    public function Restoran(){
        return $this->belongsTo(Restoran::class, 'kode_makanan', 'kode_makanan')->where('nama_makanan', $this->nama_makanan);
    }
}
