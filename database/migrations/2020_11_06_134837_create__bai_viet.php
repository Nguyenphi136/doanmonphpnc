<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaiViet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BaiViet', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('TieuDe');
            $table->longText('TieuDeKhongDau');
            $table->longText('TomTat');
            $table->longText('NoiDung');
            $table->string('Hinh');
            $table->integer('NoiBat')->default(0);
            $table->integer('SoLuotXem')->default(0);
            $table->bigInteger('idLoaiChuyenMuc')->unsigned();
            $table->foreign('idLoaiChuyenMuc')->references('id')->on('LoaiChuyenMuc')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('BaiViet');
    }
}
