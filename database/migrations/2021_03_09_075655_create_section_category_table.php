<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->unsignedInteger('section_id')->unsigned()->nullable();
            $table->string('type');
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
        Schema::dropIfExists('section_category');
    }
}
