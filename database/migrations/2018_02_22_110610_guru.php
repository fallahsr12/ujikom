<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Guru extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('guru', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik');
            $table->string('nama_guru');
            $table->integer('id_mapel')->unsigned();
            $table->foreign('id_mapel')->references('id')->on('mapel')->onUpdate('cascade')->onDelete('cascade');
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
        //
    }
}
