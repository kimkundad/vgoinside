<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('shop_name')->nullable();
            $table->longText('description')->nullable();
            $table->integer('prov_id')->default('0');
            $table->string('shop_image')->nullable();
            $table->integer('user_id')->default('0');
            $table->integer('status')->default('0');
            $table->integer('view')->default('0');
            $table->integer('brand_id')->default('0');
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
        Schema::dropIfExists('shops');
    }
}
