<?php

namespace Database\Seeders;

use DB;
use App\Models\AnakPanti;
use Illuminate\Database\Seeder;

class AnakPantisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $anak_pantis = [['nama_anak'=>'Riska', 'tempat_lahir'=>'Bandung', 'tgl_lahir'=>'2003-03-14', 'jenis_kelamin'=>'Perempuan', 'pendidikan'=>'SMA', 'status'=>'Yatim', 'nama_orangtua_wali'=>'Budi', 'alamat_tinggal'=>'Panti Yatim Indonesia']];

        DB::table('anak_pantis')->insert($anak_pantis);
    }
}