<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('informations', function (Blueprint $table) {
            $table->unsignedBigInteger('created_userId')->nullable()->change();
            $table->unsignedBigInteger('updated_userId')->nullable()->change();
            
           
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
            
            $table->unsignedBigInteger('created_userId')->nullable(false)->change();
            $table->unsignedBigInteger('updated_userId')->nullable(false)->change();
        });
    }
}
