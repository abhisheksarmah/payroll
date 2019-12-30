<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkingHoursAdjustmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('working_hours_adjustments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('working_hours_log_id');
            $table->unsignedBigInteger('adjustment_id');
            $table->unsignedBigInteger('salary_payment_id')->nullable();
            $table->double('adjustment_amount', 8, 2);
            $table->double('adjustment_percentage', 8, 2);
            $table->timestamps();

            $table->foreign('working_hours_log_id')
                ->references('id')
                ->on('working_hours_logs')
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
        Schema::dropIfExists('working_hours_adjustments');
    }
}
