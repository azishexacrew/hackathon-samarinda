<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PemilikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('pemilik', function (Blueprint $table) {
             $table->increments('id');
             $table->string('nama');
             $table->string('no_telp');
             $table->string('alamat');
             $table->char('jk', 1);
             $table->string('tmpt_lahir');
             $table->date('tgl_lahir');
             $table->string('no_identitas');
             $table->integer('user_id')->unsigned();
             $table->integer('tenant_id')->unsigned();
             $table->foreign('user_id')->references('id')->on('users');
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
         Schema::dropIfExists('pemilik');
     }
}
