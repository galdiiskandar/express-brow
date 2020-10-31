<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('kode_user',10)->primary();
            $table->string('username',50);
            $table->string('password');
            $table->string('nama_user',20);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('alamat',50);
            $table->string('no_telp_user',50);
            $table->string('email_user')->unique();
            $table->string('foto_user');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
