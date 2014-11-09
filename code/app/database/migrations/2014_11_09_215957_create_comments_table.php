<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kb_comments', function(Blueprint $table){
			$table->increments('id');
			$table->string('comment', '500');
			$table->unsignedInteger('fk_user');
			$table->unsignedInteger('fk_workshop');

			$table->timestamps();

		});
		Schema::table('kb_comments', function($table){
			$table->foreign('fk_user')->references('id')->on('kb_users')->onDelete('CASCADE')->onUpdate('CASCADE');
			$table->foreign('fk_workshop')->references('id')->on('kb_workshops')->onDelete('CASCADE')->onUpdate('CASCADE');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Scehema::drop('kb_comments');
	}

}
