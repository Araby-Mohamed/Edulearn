<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        # Level 1 Super Admin
        #       2 Admin
        #       3 Employee
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->char('username',20);
            $table->char('first_name',20);
            $table->char('last_name',20);
            $table->char('email',50)->unique();
            $table->char('phone',20)->unique();
            $table->enum('gender',['Male','Female']);
            $table->enum('level',[1,2,3]);
            $table->char('password',150);
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
        Schema::dropIfExists('admins');
    }
}
