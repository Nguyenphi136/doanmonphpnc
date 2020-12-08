<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoaiChuyenMuc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LoaiChuyenMuc', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idChuyenMuc')->unsigned();
            $table->foreign('idChuyenMuc')->references('id')->on('ChuyenMuc')->onDelete('cascade');
            $table->string('Ten');
            $table->string('TenKhongDau');
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
        Schema::dropIfExists('LoaiChuyenMuc');
    }
}
