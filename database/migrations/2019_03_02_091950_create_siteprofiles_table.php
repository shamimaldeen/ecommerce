<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteprofilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siteprofiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_name');
            $table->string('address');
            $table->string('mobile');
            $table->string('facebooklink');
            $table->string('youtubelink');
            $table->string('twitterlink');
            $table->string('instagramlink');
            $table->string('sitelogo');
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
        Schema::dropIfExists('siteprofiles');
    }
}
