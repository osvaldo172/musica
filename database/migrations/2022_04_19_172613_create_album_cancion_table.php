<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumCancionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album_cancion', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('album_id');
            $table->bigInteger('cancion_id');
            $table->foreign('album_id')->references('id')->on('albumes');
            $table->foreign('cancion_id')->references('id')->on('canciones');
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
        Schema::dropIfExists('album_cancion');
    }
}
