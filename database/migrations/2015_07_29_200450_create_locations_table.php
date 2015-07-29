<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->index('pid')->default(0)->unsigned();
            $table->string('title', 255);
            $table->string('subtitle', 255)->nullable();
            $table->enum('type', ['state', 'region', 'city', 'district'])->index('type')->nullable()->default('state');
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
        Schema::drop('locations');
    }
}
