<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asets', function (Blueprint $table) {
            $table->id();
            $table->string('kode_aset')->nullable();
            $table->string('nama_aset')->nullable();
            $table->string('no_register')->nullable();
            $table->string('merek')->nullable();
            $table->string('ukuran')->nullable();
            $table->string('kategori_aset')->nullable();
            $table->string('satuan')->nullable();
            $table->date('tahun_pembelian')->nullable();
            $table->string('sumber_dana')->nullable();
            $table->string('gambar_aset')->nullable();
            $table->integer('jumlah')->nullable();
            $table->string('kondisi')->nullable();
            $table->string('harga')->nullable();
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
        Schema::dropIfExists('asets');
    }
};
