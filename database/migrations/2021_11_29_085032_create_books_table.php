<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_suplier')->unsigned();
            $table->string('nama_buku');
            $table->string('pengarang');
            $table->string('cover')->nullable();
            $table->Integer('stok')->nullable();
            $table->Integer('harga')->nullable();
            // fk author_id
            $table->foreign('id_suplier')->references('id')
                ->on('supliers')->onUpdate('cascade')
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
        Schema::dropIfExists('books');
    }
}
