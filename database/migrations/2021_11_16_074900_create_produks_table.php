<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->increments('id', 10);
            $table->string('name', 191);
            $table->string('description', 191);
            $table->string('stock', 191);
            $table->string('price', 191);
            $table->integer('kategori_id')->length(10)->unsigned();
            $table->timestamps();
        });

        Schema::table('produks', function (Blueprint $table) {
            $table->foreign('kategori_id')->references('id')->on('kategoris')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
}
