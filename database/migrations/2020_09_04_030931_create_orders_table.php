<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('file_id');
            $table->unsignedInteger('order_status_id');
            $table->string('order_number');
            $table->json('data');
            $table->timestamps();

            /*$table->index('file_id');
            $table->foreign('file_id')->references('id')->on('files');

            $table->index('order_status_id');
            $table->foreign('order_status_id')->references('id')->on('order_statuses');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
