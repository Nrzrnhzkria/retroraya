<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeminarQrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seminar_qr', function (Blueprint $table) {
            $table->id();
            $table->string('seminar_name'); 
            $table->string('location_name'); 
            $table->string('qr_value')->nullable(); 
            $table->date('seminar_date');
            $table->time('time_start');
            $table->time('time_end');
            $table->smallInteger('max_participant'); 
            $table->smallInteger('registered_participant')->default('0'); 
            $table->string('img_name')->nullable(); 
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
        Schema::dropIfExists('seminar_qr');
    }
}
