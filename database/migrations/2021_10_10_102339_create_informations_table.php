<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('content');
            $table->string('to_all');
            $table->unsignedBigInteger('created_userId');
            $table->unsignedBigInteger('updated_userId');
            $table->timestamps();
            
            // 外部キー制約
            $table->foreign('created_userId')->references('id')->on('users')->onDelete('no action');
            $table->foreign('updated_userId')->references('id')->on('buildings')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informations');
    }
}
