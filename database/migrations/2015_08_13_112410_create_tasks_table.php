<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index('user_id')->unsigned();
            $table->integer('category_id')->index('category_id')->unsigned();
            $table->integer('location_id')->index('location_id')->unsigned();
            $table->string('title')->index('title');
            $table->text('subtitle')->nullable();
            $table->string('photo')->nullable();
            $table->string('address')->nullable();
            $table->date('event_date');
            $table->time('event_time')->nullable();
            $table->boolean('sms')->default(0);
            $table->boolean('email')->default(1);
            $table->boolean('taskers_only')->default(0);
            $table->boolean('comments_public')->default(0);
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
        Schema::drop('tasks');
    }
}
