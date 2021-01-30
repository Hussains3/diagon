<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('invoice');
            $table->unsignedBigInteger('patient_id')->nullable();
            $table->foreign('patient_id')->references('id')->on('patients')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->foreign('doctor_id')->references('id')->on('doctors')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('broker_id')->nullable();
            $table->foreign('broker_id')->references('id')->on('brokers')->onUpdate('cascade')->onDelete('cascade');
            $table->decimal('subtotal', 25, 2)->default(0.00);
            $table->decimal('vat', 25, 2)->default(0.00);
            $table->decimal('discount', 25, 2)->default(0.00);
            $table->decimal('netTotal', 25, 2)->default(0.00);
            $table->decimal('paid', 25, 2)->default(0.00);
            $table->decimal('due', 25, 2)->default(0.00);
            $table->decimal('total_qty', 25, 2)->default(0.00);
            $table->decimal('total_cost', 25, 2)->default(0.00);
            $table->string('word')->nullable();
            $table->string('status')->default('Paid')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('sales');
    }
}
