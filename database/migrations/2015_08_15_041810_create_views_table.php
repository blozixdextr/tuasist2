<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('views', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip', 25)->index('ip')->nullable();
            $table->integer('user_id')->index('user_id')->unsigned()->nullable();
            $table->integer('viewable_id')->index('viewable_id')->unsigned();
            $table->string('viewable_type')->index('viewable_type');
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
        Schema::drop('views');
    }
}
