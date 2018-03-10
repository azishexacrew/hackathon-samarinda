<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableRutetracks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rutetracks', function (Blueprint $table) {
            $table->renameColumn('rute_details', 'rutes_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rutetracks', function (Blueprint $table) {
            $table->renameColumn('rutes_id', 'rute_details');
        });
    }
}
