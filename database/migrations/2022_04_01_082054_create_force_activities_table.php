<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('force_activities', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("time");
            $table->double("lower_threashold");
            $table->double("upper_threashold");
            
            $table->unsignedBigInteger('session_id');
            $table->foreign('session_id')->references('id')->on('sessions')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('force_activities');
    }
};
