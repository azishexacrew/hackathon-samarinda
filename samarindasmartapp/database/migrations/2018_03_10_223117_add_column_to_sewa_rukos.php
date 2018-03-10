<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToSewaRukos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sewa_rukos', function (Blueprint $table) {
            $table->string('jenis_usaha')->after('ruko_id');
            $table->string('periode_penyewaan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sewa_rukos', function (Blueprint $table) {
            //
        });
    }
}
