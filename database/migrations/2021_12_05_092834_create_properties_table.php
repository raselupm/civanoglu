<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_tr');

            $table->string('featured_image');
            $table->unsignedBigInteger('location_id');

            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('sale')->default(1)->comment('0=rent,1=sale');
            $table->unsignedBigInteger('type')->default(1)->comment('0=land,1=apartment,2=villa');

            $table->unsignedBigInteger('bedrooms')->nullable();
            $table->unsignedBigInteger('drawing_rooms')->nullable();
            $table->unsignedBigInteger('bathrooms')->nullable();
            $table->unsignedBigInteger('net_sqm')->nullable();
            $table->unsignedBigInteger('gross_sqm')->nullable();
            $table->unsignedBigInteger('pool')->nullable()->comment('0=no,1=private,2=public,3=both');

            $table->string('overview');
            $table->string('overview_tr');
            $table->longText('why_buy')->nullable();
            $table->longText('why_buy_tr')->nullable();
            $table->longText('description');
            $table->longText('description_tr');

            $table->timestamps();

            //$table->foreign('featured_media_id')->references('id')->on('media');
            $table->foreign('location_id')->references('id')->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
