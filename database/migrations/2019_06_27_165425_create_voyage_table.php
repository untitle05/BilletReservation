<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVoyageTable extends Migration {

	public function up()
	{
		Schema::create('voyage', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->dateTime('dateDep_voy');
			$table->dateTime('dateArrv_voy');
			$table->integer('frais');
			$table->integer('vehicule_id')->unsigned();
			$table->integer('destination_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('voyage');
	}
}