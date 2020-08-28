<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class penggajian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penggajians', function (Blueprint $table) {
            $table->increments('id_penggajian');
            $table->string('id_dosen');
            $table->string('bulan');
            
            $table->string('jml_hadir');
            $table->string('honor_satuan');
            $table->string('gaji_honor');         
            $table->string('total_pajak');
            $table->string('total_gaji_bersih');
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
        Schema::dropIfExists('penggajians');
    }
}
