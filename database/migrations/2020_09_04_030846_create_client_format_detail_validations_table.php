<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientFormatDetailValidationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_format_detail_validations', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('client_format_detail_id');
            $table->unsignedInteger('validation_id');
            $table->string('validation')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('client_format_detail_id');
            $table->foreign('client_format_detail_id')->references('id')->on('client_format_details');

            $table->index('validation_id');
            $table->foreign('validation_id')->references('id')->on('validations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_format_detail_validations');
    }
}
