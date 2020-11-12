<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PelangganList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggans', function (Blueprint $table) {
            $table->string('kode_pelanggan',10)->primary();
            $table->string('name',50)->nullable();
            $table->string('email')->unique();
            $table->string('no_telp_pelanggan',20)->nullable();
            $table->string('alamat_pelanggan',20)->nullable();
            $table->string('keterangan_pelanggan',20)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelanggans');
    }
}
