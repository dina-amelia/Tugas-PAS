<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnakPanti extends Model
{
    use HasFactory;
    protected $fillable = ['nama_anak','tempat_lahir','tgl_lahir','jenis_kelamin','pendidikan','status','nama_orangtua_wali','alamat_tinggal'];

}