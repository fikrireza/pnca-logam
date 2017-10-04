<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLayananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amd_layanan', function (Blueprint $table) {
            $table->increments('id');
            // PRODUK; SERVIS; SCRAPSERVIS; SCRAPPROYEK; SCRAPPRODUK;
            $table->string('kategori');
            $table->string('nama');
            $table->string('deskripsi');
            $table->string('img_url');
            $table->string('img_alt');
            $table->string('slug');
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
        Schema::dropIfExists('product');
    }
}
