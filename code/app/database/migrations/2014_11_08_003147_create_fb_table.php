<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFbTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kb_fb_profiles', function($table)
        {
            $table->increments('id');
            $table->unsignedInteger('user_id')->unsigned();
            $table->string('username');
            $table->biginteger('uid')->unsigned();
            $table->string('access_token');
            $table->string('access_token_secret');
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
		Schema::drop('kb_fb_profiles');
	}


}
