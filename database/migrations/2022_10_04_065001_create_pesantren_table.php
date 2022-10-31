<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesantrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesantren', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('pembuatid');
            $table->integer('provinsiid');
            $table->string('nama');
            $table->string('alamat');
            $table->string('pemilik')->nullable();
            $table->string('tahunberdiri')->nullable();
            $table->string('notelpon');
            $table->integer('luas')->nullable();
            $table->integer('jumlahsantri')->nullable();
            $table->integer('jumlahpengajar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesantren');
    }
}
