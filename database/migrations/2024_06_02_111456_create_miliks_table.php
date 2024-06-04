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
        Schema::create('miliks', function (Blueprint $table) {
            $table->id();
            $table->string('no_milik')->nullable();
            $table->string('aset_milik')->nullable();
            $table->string('kode_milik')->nullable();
            $table->string('regist')->nullable();
            $table->string('ruang_milik')->nullable();
            $table->string('nama_milik')->nullable();
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
        Schema::dropIfExists('miliks');
    }
};
