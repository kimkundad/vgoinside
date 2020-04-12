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
          $table->bigIncrements('id');
          $table->string('name');
          $table->string('email')->unique();
          $table->timestamp('email_verified_at')->nullable();
          $table->string('password');
          $table->boolean('is_admin')->nullable();
          $table->string('provider')->nullable();
          $table->string('provider_id')->nullable();
          $table->string('access_token')->nullable();
          $table->string('avatar')->nullable();
          $table->string('phone')->nullable();
          $table->text('address')->nullable();
          $table->string('birthday')->nullable();
          $table->string('zipcode')->nullable();
          $table->integer('country')->nullable();
          $table->string('code_user')->nullable();
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
