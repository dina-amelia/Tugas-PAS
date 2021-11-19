<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $table = 'laporans';
    protected $fillable = ["pengeluaran_id","donasi_id","konfirmasi_id","pemasukan","pengeluaran","saldo"];
}
