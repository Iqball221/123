<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_buku')->unsigned();
            $table->string('jumlah');
            $table->string('harga');
            $table->string('total_harga');
            $table->string('cover')->nullable();
            $table->Integer('bayar')->nullable();
            $table->Integer('kembalian')->nullable();
            // fk author_id
            $table->foreign('id_buku')->references('id')
                ->on('books')->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('transaksis');
    }
}
