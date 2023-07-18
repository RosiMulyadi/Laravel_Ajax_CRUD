<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restoran extends Model
{
    use HasFactory;

    protected $table = "restoran";
    protected $primarykey = "id";
    protected $fillable = [
        'kode_restoran',
        'nama_restoran',
        'kode_makanan',
        'nama_makanan',
        'alamat',
    ];

    public function Food(){
        return $this->hasMany(Food::class, 'kode_makanan', 'kode_makanan')->where('nama_makanan', $this->nama_makanan);
    }
}
