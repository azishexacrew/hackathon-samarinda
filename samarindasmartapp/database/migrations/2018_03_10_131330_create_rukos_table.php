<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRukosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('rukos', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('nomor_ruko');
        //     $table->string('blok_ruko');
        //     $table->string('slug')->unique();
        //     $table->string('image')->nullable();
        //     $table->string('keterangan');
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
        // Schema::dropIfExists('rukos');
    }
}
