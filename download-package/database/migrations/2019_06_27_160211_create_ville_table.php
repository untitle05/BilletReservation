<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDestinationTable extends Migration
{

	public function up()
	{
		Schema::create('destination', function (Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('destination_name', 255);
		});
	}

	public function down()
	{
		Schema::drop('destination');
	}
}
