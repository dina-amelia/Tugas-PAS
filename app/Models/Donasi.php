<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    use HasFactory;
    protected $fillable = ['konfirmasi_id','nama_donatur','jumlah','tanggal','keterangan'];

    public function konfirmasi()
    {
        return $this->belongsTo(Konfirmasi::class, 'konfirmasi_id', 'id');
    }

}
