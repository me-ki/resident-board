<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeCreatedUserIdAndUpdatedUserIdUnsignedBigIntegerToStringOnInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('informations', function (Blueprint $table) {
            $table->string('created_userId')->change();
            $table->string('updated_userId')->change();
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
            $table->unsignedBigInteger('created_userId')->change();
            $table->unsignedBigInteger('updated_userId')->change();
        });
    }
}
