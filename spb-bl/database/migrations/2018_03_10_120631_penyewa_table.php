<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PenyewaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('penyewa', function (Blueprint $table) {
             $table->increments('id');
             $table->string('nama');
             $table->string('no_telp');
             $table->string('alamat');
             $table->char('jk', 1);
             $table->string('tmpt_lahir');
             $table->date('tgl_lahir');
             $table->string('no_identitas');
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
         Schema::dropIfExists('penyewa');
     }
}
