<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengelolasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengelolas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kegiatan_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('pengeluaran_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('galeri_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('donasi_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('konfirmasi_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('anak_panti_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('nama');
            $table->string('username');
            $table->string('password');
            $table->string('jabatan');
            $table->string('alamat');
            $table->string('telepon');
            $table->string('foto');
            // //fk kegiatan_id
            // $table->foreign('kegiatan_id')->references('idKegiatan')
            // ->on('kegiatans')->onUpdate('cascade')
            // ->onDelete('cascade');
            // //fk pengeluaran_id
            // $table->foreign('pengeluaran_id')->references('idPengeluaran')
            // ->on('pengeluarans')->onUpdate('cascade')
            // ->onDelete('cascade');
            // //fk galeri_id
            // $table->foreign('galeri_id')->references('idGaleri')
            // ->on('galeris')->onUpdate('cascade')
            // ->onDelete('cascade');
            // //fk donasi_id dan konfirmasi_id
            // $table->foreign('donasi_id')->references('idDonasi')
            // ->on('donasis')->onUpdate('cascade')
            // ->onDelete('cascade');
            // $table->foreign('konfirmasi_id')->references('konfirmasi_id')
            // ->on('donasis')->onUpdate('cascade')
            // ->onDelete('cascade');
            // //fk idAnakAsuh
            // $table->foreign('idAnakAsuh')->references('idAnakAsuh')
            // ->on('anak_pantis')->onUpdate('cascade')
            // ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengelolas');
    }
}