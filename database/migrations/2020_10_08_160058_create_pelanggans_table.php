<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelanggansTable extends Migration
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
            $table->string('nama_pelanggan',50);
            $table->string('alamat_email',50);
            $table->string('no_telp_pelanggan',20);
            $table->string('alamat_pelanggan',20);
            $table->string('keterangan_pelanggan',20);
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
