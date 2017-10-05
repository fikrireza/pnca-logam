<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amd_general', function (Blueprint $table) {
            $table->increments('id');
            $table->text('produk')->nullable();
            $table->string('img_produk');
            $table->text('servis')->nullable();
            $table->string('img_servis');
            $table->text('scrapproduk')->nullable();
            $table->string('img_scrapproduk');
            $table->text('scrapservis')->nullable();
            $table->string('img_scrapservis');
            $table->string('email_to')->nullable();
            $table->string('email_cc')->nullable();
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
        Schema::dropIfExists('general');
    }
}
