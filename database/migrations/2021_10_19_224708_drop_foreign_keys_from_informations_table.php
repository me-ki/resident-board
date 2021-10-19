<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropForeignKeysFromInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('informations', function (Blueprint $table) {
            $table->dropForeign('informations_created_userId_foreign');
            $table->dropForeign('informations_updated_userId_foreign');
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
            // 外部キー制約
            $table->foreign('created_userId')->references('id')->on('users')->onDelete('no action');
            $table->foreign('updated_userId')->references('id')->on('users')->onDelete('no action');
        });
    }
}
