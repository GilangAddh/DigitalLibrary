<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_buku', function (Blueprint $table) {
            $table->id('id_post');
            $table->unsignedBigInteger('id_kategori')->index();
            $table->string('judul');
            $table->string('deskripsi');
            $table->integer('jumlah');
            $table->string('cover');
            $table->string('file');
            $table->timestamps();

            $table->foreign('id_kategori')->references('id_kategori')->on('tbl_kategori')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
