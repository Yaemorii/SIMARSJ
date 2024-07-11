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
        Schema::create('mutasis', function (Blueprint $table) {
            $table->id();
            $table->string('tgl_mutasi')->nullable();
            $table->string('jenis_mutasi')->nullable();
            $table->string('aset_mutasi')->nullable();
            $table->string('ruangan_asal')->nullable();
            $table->string('tujuan')->nullable();
            $table->string('nilai_aset')->nullable();
            $table->string('alasan_mutasi')->nullable();
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
        Schema::dropIfExists('mutasis');
    }
};
