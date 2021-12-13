<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ATest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atests', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name',255);
            $table->string('slug',255)->unique();
            $table->dateTime('createdAt',$precision = 0);
            $table->dateTime('updatedAt',$precision = 0);
        });
    }
/**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atests');
    }
}
