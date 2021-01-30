<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 25, 2)->default(0.00);
            $table->decimal('min_price', 25, 2)->default(0.00);
            $table->decimal('cost', 25, 2)->default(0.00);
            $table->timestamps();
            $table->unsignedBigInteger('category');
            $table->foreign('category')->references('id')
                ->on('testcategories')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tests');
    }
}
