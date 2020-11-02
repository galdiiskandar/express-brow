<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrontSiteConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('front_site_configs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bannerHome')->nullable();
            $table->string('bannerPromo1')->nullable();
            $table->string('bannerPromo2')->nullable();
            $table->string('bannerPromo3')->nullable();
            $table->text('contact')->nullable();
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
        Schema::dropIfExists('front_site_configs');
    }
}
