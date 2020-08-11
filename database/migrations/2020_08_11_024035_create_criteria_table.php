<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criteria', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('admin_id')->unsigned();
            $table->double('harga_jarak');
            $table->double('harga_fasilitas');
            $table->double('harga_luas');
            $table->double('jarak_harga');
            $table->double('jarak_fasilitas');
            $table->double('jarak_luas');
            $table->double('fasilitas_harga');
            $table->double('fasilitas_jarak');
            $table->double('fasilitas_luas');
            $table->double('luas_harga');
            $table->double('luas_jarak');
            $table->double('luas_fasilitas');
            $table->timestamps();

            $table->foreign('admin_id')->references('id')->on('admin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('criteria');
    }
}
