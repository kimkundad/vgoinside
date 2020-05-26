<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFolderImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('folder_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('folder_id')->default('0');
            $table->string('image')->nullable();
            $table->integer('user_id')->default('0');
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
        Schema::dropIfExists('folder_images');
    }
}
