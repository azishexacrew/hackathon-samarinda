<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TenantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('tenant', function (Blueprint $table) {
             $table->increments('id');
             $table->string('area');
             $table->string('blok');
             $table->integer('nomor');
             $table->string('luas');
             $table->float('harga');
             $table->integer('pemilik_id');
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
         Schema::dropIfExists('tenant');
     }
}
