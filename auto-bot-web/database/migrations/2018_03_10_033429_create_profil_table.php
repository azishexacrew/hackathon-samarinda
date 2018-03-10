<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profil', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('users_id');
            $table->string('NIK')->default(null);
            $table->string('address')->default(null);
            $table->string('kecamatan')->default(null);
            $table->string('kelurahan')->default(null);
            $table->string('rt')->default(null);
            $table->string('lat')->default(null);
            $table->string('lng')->default(null);
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
        Schema::dropIfExists('profil');
    }
}
