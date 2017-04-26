<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExcersisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('excersises', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('name');
			$table->text('excersise');
		    $table->integer('group_id')->unsigned();
		    $table->foreign('group_id')->references('id')->on('group');


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
	    Schema::dropIfExists('excersises');
    }
}
