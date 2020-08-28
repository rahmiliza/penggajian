<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class mengajar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mengajars', function (Blueprint $table) {
            $table->increments('id_mengajar');
            $table->string('id_dosen');
            $table->string('kode_mk');
            $table->string('thn_akademik');
            $table->string('smt_akademik');
            $table->string('ket');
            $table->string('id_jurusan');
            $table->string('id_kelas');

            $table->timestamps();
        });
    } //'id_mengajar','id_dosen','kode_mk','thn_akademik','smt_akademik','id_jurusan','ket','id_kelas'];
         

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mengajars');
    }
}
