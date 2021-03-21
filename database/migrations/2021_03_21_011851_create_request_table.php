<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('hosp_id');
            $table->foreign('hosp_id')->references('hosp_id')->on('hospitals');
            $table->string('name')->nullable();
            $table->string('age')->nullable();
            $table->string('addr')->nullable();
            $table->string('contact')->nullable();
            $table->string('diabetes')->nullable();
            $table->string('pulse')->nullable();
            $table->string('covid')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request');
    }
}
