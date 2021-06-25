<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTintucTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tintuc', function (Blueprint $table) {
            $table->increments('id');
            $table->string('TieuDe', 255);
            $table->string('TieuDeKhongDau', 255);
            $table->text('TomTat');
            $table->longText('NoiDung');

            $table->string('TieuDe_en', 255);
            $table->string('TieuDeKhongDau_en', 255);
            $table->text('TomTat_en');
            $table->longText('NoiDung_en');

            $table->string('Hinh')->nullable();
            $table->integer('NoiBat')->default(0);
            $table->integer('SoLuotXem')->default(0);
            $table->integer('idLoaiTin')->unsigned();
            $table->foreign('idLoaiTin')->references('id')->on('loaitin');

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
        Schema::dropIfExists('tintuc');
    }
}
