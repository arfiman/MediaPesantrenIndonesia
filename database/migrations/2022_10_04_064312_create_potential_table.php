<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreatePotentialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('potential', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name');
        });

        DB::table('potential')->insert([
            ['name'=>'Perkebunan'],
            ['name'=>'Perikanan'],
            ['name'=>'Peternakan'],
            ['name'=>'Pertanian'],
            ['name'=>'Kerajinan'],
            ['name'=>'Wisata']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('potential');
    }
}
