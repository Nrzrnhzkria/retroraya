<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membership', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payer_id');
            $table->foreign('payer_id')->references('id')->on('users');  
            $table->smallInteger('amount'); 
            $table->string('status')->nullable();
            $table->string('senangpay_id'); 
            $table->string('booth_id')->nullable();
            $table->string('details_id')->nullable();
            $table->string('toyyib_billcode')->nullable();
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
        Schema::dropIfExists('membership');
    }
}
