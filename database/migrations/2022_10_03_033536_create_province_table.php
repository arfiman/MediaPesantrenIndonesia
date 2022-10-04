<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateProvinceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('province', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name');
        });

        DB::table('province')->insert([
            ['name'=>'Aceh'],
            ['name'=>'Sumatra Utara'],
            ['name'=>'Sumatra Barat'],
            ['name'=>'Riau'],
            ['name'=>'Kepulauan Riau'],
            ['name'=>'Jambi'],
            ['name'=>'Bengkulu'],
            ['name'=>'Sumatra Selatan'],
            ['name'=>'Kepualuan Bangka Belitung'],
            ['name'=>'Lampung'],
            ['name'=>'Banten'],
            ['name'=>'Jakarta'],
            ['name'=>'Jawa Barat'],
            ['name'=>'Jawa Tengah'],
            ['name'=>'Yogyakarta'],
            ['name'=>'Jawa Timur'],
            ['name'=>'Bali'],
            ['name'=>'Nusa Tenggara Barat'],
            ['name'=>'Nusa Tenggara Timur'],
            ['name'=>'Kalimantan Barat'],
            ['name'=>'Kalimantan Tengah'],
            ['name'=>'Kalimantan Selatan'],
            ['name'=>'Kalimantan Timur'],
            ['name'=>'Kalimantan Utara'],
            ['name'=>'Sulawesi Barat'],
            ['name'=>'Sulawesi Selatan'],
            ['name'=>'Sulawesi Tenggara'],
            ['name'=>'Sulawesi Tengah'],
            ['name'=>'Gorontalo'],
            ['name'=>'Sulawesi Utara'],
            ['name'=>'Maluku Utara'],
            ['name'=>'Maluku'],
            ['name'=>'Papua Barat'],
            ['name'=>'Papua'],
            ['name'=>'Papua Tengah'],
            ['name'=>'Papua Pegunungan'],
            ['name'=>'Papua Selatan'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('province');
    }
}
