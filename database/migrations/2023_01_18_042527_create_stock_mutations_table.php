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
        Schema::create('stock_mutations', function (Blueprint $table) {
            $table->id();
            $table->string('batch_number');
            $table->double('quantity');
            $table->unsignedBigInteger('outlet_id');
            $table->date('date');
            $table->string('documentation');
            $table->timestamps();

            $table->foreign('batch_number')->references('batch_number')->on('warehouses')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('outlet_id')->references('id')->on('outlets')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_mutations');
    }
};
