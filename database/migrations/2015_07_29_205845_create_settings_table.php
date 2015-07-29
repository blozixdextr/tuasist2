<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->index('pid')->nullable()->unsigned();
            $table->string('name', 255)->index('name');
            $table->string('value', 255)->nullable();
            $table->string('title', 255)->nullable();
            $table->string('subtitle', 255)->nullable();
            $table->string('category', 100)->nullable()->index('category');
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
        Schema::drop('settings');
    }
}
