<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddsUserIdToInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('informations', function (Blueprint $table) {
            $table->unsignedBigInteger('created_userId');
            $table->foreign('created_userId')->references('id')->on('users');
	        $table->unsignedBigInteger('updated_userId');
            $table->foreign('updated_userId')->references('id')->on('users');
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
            $table->dropForeign('informations_created_userId_foreign');
            $table->dropColumn('created_userId');
            $table->dropForeign('informations_updated_userId_foreign');
            $table->dropColumn('updated_userId');
        });
    }
}
