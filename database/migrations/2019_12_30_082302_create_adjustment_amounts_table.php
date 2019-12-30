<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdjustmentAmountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adjustment_amounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('salary_payment_id');
            $table->unsignedBigInteger('adjustment_id');
            $table->double('adjustment_amount', 8, 2);
            $table->double('adjustment_percentage', 8, 2);
            $table->timestamps();

            $table->foreign('salary_payment_id')
                ->references('id')
                ->on('salary_payments')
                ->onDelete('cascade');

            $table->foreign('adjustment_id')
                ->references('id')
                ->on('adjustments')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adjustment_amounts');
    }
}
