<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehiculeTable extends Migration {

	public function up()
	{
		Schema::create('vehicule', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('immat_vehi', 255)->unique();
			$table->string('marque_vehi', 255);
			$table->string('model', 255);
			$table->integer('nbrPlace_vehi');
			$table->string('vitesseMax', 255);
		});
	}

	public function down()
	{
		Schema::drop('vehicule');
	}
}