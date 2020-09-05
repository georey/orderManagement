<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientFormatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_formats', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('format_id');
            $table->timestamps();
            $table->softDeletes();

            /*$table->index('client_id');
            $table->foreign('client_id')->references('id')->on('clients');

            $table->index('format_id');
            $table->foreign('format_id')->references('id')->on('formats');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_formats');
    }
}
