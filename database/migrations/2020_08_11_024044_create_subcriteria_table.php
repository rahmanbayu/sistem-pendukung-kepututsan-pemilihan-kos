<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubcriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcriteria', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('admin_id')->unsigned();
            $table->integer('sbaik_baik');
            $table->integer('sbaik_sedang');
            $table->integer('sbaik_kurang');
            $table->integer('sbaik_skurang');
            $table->integer('baik_sedang');
            $table->integer('baik_kurang');
            $table->integer('baik_skurang');
            $table->integer('sedang_kurang');
            $table->integer('sedang_skurang');
            $table->integer('kurang_skurang');
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
        Schema::dropIfExists('subcriteria');
    }
}
