<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipsToMobilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mobil', function (Blueprint $table) {
            $table->integer('id_merk')->unsigned()->change();
            $table->foreign('id_merk')->references('id')->on('merk')
         ->onUpdate('cascade')->onDelete('cascade');
     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mobil', function (Blueprint $table) {
            $table->dropForeign('mobil_id_merk_foreign');
        });
        Schema::table('mobil', function (Blueprint $table) {
            $table->dropIndex('mobil_id_merk_foreign');
        });
        Schema::table('mobil', function (Blueprint $table) {
            $table->integer('id_merk');
        });
    }
}
