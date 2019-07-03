<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVoyageTable extends Migration {

	public function up()
	{
		Schema::create('voyage', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('dateDep_voy', 255);
			$table->string('dateArrv_voy', 255);
			$table->double('frais');
			$table->integer('nbrPlace_voy');
			$table->integer('id_vehicule')->unsigned();
			$table->integer('id_destination')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('voyage');
	}
}