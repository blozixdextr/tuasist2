<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unique()->index('user_id')->unsigned();
            $table->enum('type', ['personal', 'company'])->nullable()->index('type');
            $table->string('first_name', 60)->nullable();
            $table->string('last_name', 60)->nullable();
            $table->enum('sex', ['male', 'female', 'other'])->nullable();
            $table->date('dob')->nullable();
            $table->string('about', 255)->nullable();
            $table->string('avatar', 40)->nullable();
            $table->string('phone', 20)->nullable();
            $table->integer('location')->nullable()->index('location')->unsigned();
            $table->enum('subscribe_period', ['asap', 'hour', 'twice-day', 'day', 'two-days'])->nullable()->index('subscribe_period');
            $table->enum('subscribe_type', ['mail', 'sms'])->nullable()->index('subscribe_type');
            $table->timestamp('subscribe_sent')->nullable()->index('subscribe_sent');
            $table->timestamp('last_activity')->nullable()->index('last_activity');
            $table->string('passport', 40)->nullable();
            $table->string('facebook', 255)->nullable()->index('facebook');
            $table->string('twitter', 255)->nullable()->index('twitter');
            $table->string('google', 255)->nullable()->index('google');
            $table->string('paypal', 255)->nullable()->index('paypal');
            $table->boolean('confirmed_email')->nullable()->default(0);
            $table->boolean('confirmed_mobile')->nullable()->default(0);
            $table->boolean('confirmed_passport')->nullable()->default(0);
            $table->boolean('confirmed_facebook')->nullable()->default(0);
            $table->boolean('confirmed_paypal')->nullable()->default(0);
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
        Schema::drop('user_profiles');
    }
}
