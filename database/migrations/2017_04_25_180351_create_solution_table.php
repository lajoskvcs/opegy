<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolutionTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('solution', function (Blueprint $table) {
			$table->increments('id');

			$table->text('solution');
			$table->text('comment');
			$table->boolean('is_good');

			$table->integer('excersise_id')->unsigned();
			$table->foreign('excersise_id')->references('id')->on('excersises');

			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');

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
		Schema::dropIfExists('solution');
	}
}
