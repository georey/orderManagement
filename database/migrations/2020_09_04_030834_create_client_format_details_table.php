<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientFormatDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_format_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('client_format_id');
            $table->unsignedInteger('parent_id')->nullable();
            $table->string('field');
            $table->string('description')->nullable();
            $table->timestamps();
            $table->softDeletes();

           /* $table->index('client_format_id');
            $table->foreign('client_format_id')->references('id')->on('client_formats');

            $table->index('parent_id');
            $table->foreign('parent_id')->references('id')->on('client_format_details');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_format_details');
    }
}
