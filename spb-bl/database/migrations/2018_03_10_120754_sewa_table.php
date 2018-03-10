<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SewaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('sewa', function (Blueprint $table) {
             $table->increments('id');
             $table->string('kode');
             $table->date('awal');
             $table->integer('lama');
             $table->date('akhir');
             $table->integer('pemilik_id')->unsigned();
             $table->integer('penyewa_id')->unsigned();
             $table->integer('tenant_id')->unsigned();
             $table->foreign('pemilik_id')->references('id')->on('pemilik');
             $table->foreign('penyewa_id')->references('id')->on('penyewa');
             $table->foreign('tenant_id')->references('id')->on('tenant');
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
         Schema::dropIfExists('sewa');
     }
}
