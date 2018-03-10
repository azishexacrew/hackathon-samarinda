<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSewaRukosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('sewa_rukos', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('nama');
        //     $table->string('alamat');
        //     $table->string('no_hp');
        //     $table->integer('ruko_id')->nullable()->unsigned();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('sewa_rukos');
    }
}
