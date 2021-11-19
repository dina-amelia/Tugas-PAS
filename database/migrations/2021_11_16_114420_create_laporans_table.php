<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengeluaran_id')
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
            $table->string('pemasukan');
            $table->string('pengeluaran');
            $table->string('saldo');
            $table->string('cetak');
            //fk pengeluaran_id
            // $table->foreign('pengeluaran_id')->references('id')
            // ->on('pengeluarans')->onUpdate('cascade')
            // ->onDelete('cascade');
            // //fk donasi_id dan konfirmasi_id
            // $table->foreign('donasi_id')->references('id')
            // ->on('donasis')->onUpdate('cascade')
            // ->onDelete('cascade');
            // $table->foreign('konfirmasi_id')->references('id')
            // ->on('konfirmasis')->onUpdate('cascade')
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
        Schema::dropIfExists('laporans');
    }
}