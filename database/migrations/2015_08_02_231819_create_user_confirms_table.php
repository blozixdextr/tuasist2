<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserConfirmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_confirms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index('user_id')->unsigned();
            $table->enum('type', ['email', 'mobile'])->index('type');
            $table->string('token', 100);
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
        Schema::drop('user_confirms');
    }
}
