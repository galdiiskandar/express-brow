<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transaksis', function (Blueprint $table) {
            $table->string('kode_transaksi',10)->default('0');
            $table->string('kode_produk',10);
            $table->integer('qty');
            $table->integer('harga');
            $table->timestamps();

            $table->foreign('kode_transaksi')->references('kode_transaksi')->on('transaksis')->onDelete('cascade');
            $table->foreign('kode_produk')->references('kode_produk')->on('barangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_transaksis');
    }
}
