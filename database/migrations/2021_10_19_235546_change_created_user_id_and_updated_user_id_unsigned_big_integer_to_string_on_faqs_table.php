<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeCreatedUserIdAndUpdatedUserIdUnsignedBigIntegerToStringOnFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('faqs', function (Blueprint $table) {
            $table->renameColumn('created_userId', 'created_userName');
            $table->renameColumn('updated_userId', 'updated_userName');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('faqs', function (Blueprint $table) {
            $table->renameColumn('created_userName', 'created_userId');
            $table->renameColumn('updated_userName', 'updated_userId');
        });
    }
}
