<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKjmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kjms', function (Blueprint $table) {
            $table->increments('id-kjm');
            $table->string('thn_akademik');
            $table->string('smt_akademik');
            $table->string('jml_sks');
            $table->string('sks_wajib');
            $table->string('kelebihan');
            $table->string('keterangan');
             $table->string('kjm');
            $table->string('pajak');

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
        Schema::dropIfExists('kjms');
    }
}
