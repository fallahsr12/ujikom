<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pusat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('pusat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kehadiran_siswa');
            $table->string('kehadiran_guru');
            $table->string('siswa_terlambat');
            $table->integer('id_siswa')->unsigned();
            $table->foreign('id_siswa')->references('id')->on('siswa')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('id_kehadiransiswa')->unsigned();
            $table->foreign('id_kehadiransiswa')->references('id')->on('kehadiran_siswa')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('id_kehadiranguru')->unsigned();
            $table->foreign('id_kehadiranguru')->references('id')->on('kehadiran_guru')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('id_siswaterlambat')->unsigned();
            $table->foreign('id_siswaterlambat')->references('id')->on('siswa_terlambat')->onUpdate('cascade')->onDelete('cascade');
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
