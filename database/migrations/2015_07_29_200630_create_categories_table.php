<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->index('pid')->default(0)->unsigned();
            $table->string('icon', 20)->nullable();
            $table->string('image', 20)->nullable();
            $table->string('title', 255);
            $table->string('subtitle', 255)->nullable();
            $table->text('seo')->nullable();
            $table->enum('type', ['category', 'subcategory', 'subsubcategory'])->index('type')->nullable()->default('category');
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
        Schema::drop('categories');
    }
}
