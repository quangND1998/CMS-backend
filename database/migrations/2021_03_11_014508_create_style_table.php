<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStyleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('style', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('color')->unique();
            $table->string('background_color')->unique();
            $table->string('font_size')->unique();
            $table->integer('page_id')->unique()->unsigned();
            $table->foreign('page_id')->references('id')->on('page')->onDelete('cascade');
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
        Schema::dropIfExists('style');
    }
}
