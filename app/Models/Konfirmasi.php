<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konfirmasi extends Model
{
    use HasFactory;
    protected $table = 'konfirmasis';
    protected $fillable = ["nama_donatur","tanggal","nominal","pemilik_rekening","telepon","keterangan"];

    public function donasi()
    {
        return $this->hasMany(Donasi::class, 'konfirmasi_id');
    }
}