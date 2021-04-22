<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('title_vn');
            $table->text('text')->nullable();
            $table->text('text_vn')->nullable();
            $table->string('sub_title')->nullable();
            $table->string('sub_title_vn')->nullable();
            $table->integer('number')->nullable();
            $table->unsignedInteger('page_id')->unsigned()->nullable();
            $table->foreign('page_id')->references('id')->on('page')->onDelete('cascade');
            $table->integer('theme_id')->unsigned()->nullable();
            $table->foreign('theme_id')->references('id')->on('theme')->onDelete('cascade');
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
        Schema::dropIfExists('section');
    }
}
