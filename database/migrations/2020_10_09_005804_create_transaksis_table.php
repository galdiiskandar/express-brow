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
            $table->string('kode_transaksi',10)->primary();
            $table->string('kode_proyek',10);
            $table->string('kode_pelanggan',10);
            $table->string('kode_user',10);
            $table->date('tanggal');
            $table->integer('total');
            $table->string('keterangan_transaksi');
            $table->timestamps();

            $table->foreign('kode_proyek')->references('kode_proyek')->on('proyeks')->onDelete('cascade');
            $table->foreign('kode_pelanggan')->references('kode_pelanggan')->on('pelanggans')->onDelete('cascade');
            $table->foreign('kode_user')->references('kode_user')->on('users')->onDelete('cascade');
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
