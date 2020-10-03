<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMobil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobil', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 30);
            $table->string('warna', 20);
            $table->string('no_polisi', 10);
            $table->integer('jumlah_kursi');
            $table->integer('tahun_beli');
            $table->string('gambar', 100);
            $table->integer('id_merk');
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
        Schema::dropIfExists('mobil');
    }
}
