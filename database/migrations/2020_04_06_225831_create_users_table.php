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
            $table->increments('id');
            $table->integer('ssn')->unique();
            $table->char('first_name',20);
            $table->char('last_name',20);
            $table->char('email',50)->unique();
            $table->char('phone',20)->unique();
            $table->string('password',150);
            $table->date('birthDate');
            $table->string('address',150);
            $table->enum('gender',['Male','Female']);
            $table->char('image',100);
            $table->enum('level',['1','2']);
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
