<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipsToPesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pesanan', function (Blueprint $table) {
           $table->integer('id_pemesan')->unsigned()->change();
           $table->foreign('id_pemesan')->references('id')->on('pemesan')
           ->onUpdate('cascade')->onDelete('cascade');

           $table->integer('id_mobil')->unsigned()->change();
           $table->foreign('id_mobil')->references('id')->on('mobil')
           ->onUpdate('cascade')->onDelete('cascade');

           $table->integer('id_perjalanan')->unsigned()->change();
           $table->foreign('id_perjalanan')->references('id')->on('perjalanan')
           ->onUpdate('cascade')->onDelete('cascade');

           $table->integer('id_jenis_bayar')->unsigned()->change();
           $table->foreign('id_jenis_bayar')->references('id')->on('jenis_bayar')
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
        Schema::table('pesanan', function (Blueprint $table) {
         $table->dropForeign('pesanan_id_pemesan_foreign');
     });
        Schema::table('pesanan', function (Blueprint $table) {
         $table->dropIndex('pesanan_id_pemesan_foreign');
     });
        Schema::table('pesanan', function (Blueprint $table) {
         $table->integer('id_pemesan');
     });
        //
        Schema::table('pesanan', function (Blueprint $table) {
         $table->dropForeign('pesanan_id_mobil_foreign');
     });
        Schema::table('pesanan', function (Blueprint $table) {
         $table->dropIndex('pesanan_id_mobil_foreign');
     });
        Schema::table('pesanan', function (Blueprint $table) {
            $table->integer('id_mobil');

        });

        //

        Schema::table('pesanan', function (Blueprint $table) {
            $table->dropForeign('pesanan_id_perjalanan_foreign');
        });
        Schema::table('pesanan', function (Blueprint $table) {
            $table->dropIndex('pesanan_id_perjalanan_foreign');
        });
        Schema::table('pesanan', function (Blueprint $table) {
           $table->integer('id_perjalanan');

       });
         //
        Schema::table('pesanan', function (Blueprint $table) {
           $table->dropForeign('pesanan_id_jenis_bayar_foreign');
       });
        Schema::table('pesanan', function (Blueprint $table) {
           $table->dropIndex('pesanan_id_jenis_bayar_foreign');
       });
        Schema::table('pesanan', function (Blueprint $table) {
          $table->integer('id_jenis_bayar');

      });
    }
}
