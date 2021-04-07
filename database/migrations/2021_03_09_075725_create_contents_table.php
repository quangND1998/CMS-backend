<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('video')->nullable();
            $table->string('image')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('short_content')->nullable();
            $table->text('detail')->nullable();
            $table->string('title');
            $table->string('icon_image')->nullable();
            $table->string('icon_class')->nullable();
            $table->unsignedInteger('section_id')->unsigned()->nullable();
            $table->foreign('section_id')->references('id')->on('section')->onDelete('cascade');
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
        Schema::dropIfExists('contents');
    }
}