<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building_informations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('information_id');
            $table->unsignedBigInteger('building_id');
            $table->timestamps();
            
            // 外部キー制約
            $table->foreign('information_id')->references('id')->on('informations')->onDelete('cascade');
            $table->foreign('building_id')->references('id')->on('buildings')->onDelete('cascade');
            
            // information_idとbuilding_idの組み合わせの重複を許さない
            $table->unique(['information_id', 'building_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('building_informations');
    }
}
