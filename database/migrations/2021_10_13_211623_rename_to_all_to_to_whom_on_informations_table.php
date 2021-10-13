<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameToAllToToWhomOnInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('informations', function (Blueprint $table) {
            $table->renameColumn('to_all', 'to_whom');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('informations', function (Blueprint $table) {
            $table->renameColumn('to_whom','to_all');
        });
    }
}
