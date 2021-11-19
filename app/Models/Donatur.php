<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
    use HasFactory;
    protected $table = 'donaturs';
    protected $fillable = ['id','konfirmasi_id','nama','username','password','telepon'];
}
