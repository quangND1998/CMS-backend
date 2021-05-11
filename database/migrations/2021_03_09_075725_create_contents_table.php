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
            $table->string('tour360')->nullable();
            $table->string('scan')->nullable();
            $table->text('detail')->nullable();
            $table->text('detail_vn')->nullable();
            $table->string('title');
            $table->string('title_vn');
            $table->string('icon_class')->nullable();
            $table->string('video_upload')->nullable();
            $table->unsignedInteger('section_id')->unsigned()->nullable();
            $table->foreign('section_id')->references('id')->on('section')->onDelete('cascade');
            $table->unsignedInteger('section_category_id')->unsigned()->nullable();
            $table->foreign('section_category_id')->references('id')->on('section_category')->onDelete('cascade');
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
