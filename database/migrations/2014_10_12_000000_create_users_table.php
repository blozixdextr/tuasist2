<?php

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
            $table->boolean('is_active')->index('is_active');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('locale', 2)->nullable();
            $table->string('password', 60);
            $table->enum('provider', ['local', 'facebook', 'twitter', 'google', 'linkedin', 'github', 'bitbucket'])
                ->index('provider')->nullable()->default('local');
            $table->string('oauth_id')->index('oauth_id')->nullable();
            $table->enum('role', ['user', 'moderator', 'admin'])->index('role')->default('user');
            $table->enum('type', ['tasker', 'client'])->index('type')->nullable();
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
        Schema::drop('users');
    }
}
