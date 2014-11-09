<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kb_users', function(Blueprint $table){
			$table->increments('id')->unsigned();
			$table->string('username')->unique();
			$table->string('email')->unique();
			$table->string('password');

			$table->string('avatar')->default('http://turriffcaravans.co.uk/wp-content/uploads/2013/10/anon-avatar.png');
			$table->string('over');
			$table->string('facebook')->nullable();
			$table->string('twitter')->nullable();
			$table->string('website')->nullable();
			$table->boolean('active')->default(1);

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
		Schema::drop('kb_users');
	}

}
