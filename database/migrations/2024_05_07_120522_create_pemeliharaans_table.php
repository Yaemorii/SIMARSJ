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
        Schema::create('pemeliharaans', function (Blueprint $table) {
            $table->id();
            $table->string('tgl_pemeliharaan')->nullable();
            $table->string('jenis_pemeliharaan')->nullable();
            $table->string('aset_pelihara')->nullable();
            $table->string('ruangan')->nullable();
            $table->integer('jumlah_pelihara')->nullable();
            $table->string('biaya_pemeliharaan')->nullable();
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
        Schema::dropIfExists('pemeliharaans');
    }
};
