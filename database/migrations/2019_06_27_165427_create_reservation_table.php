<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReservationTable extends Migration {

	public function up()
	{
		Schema::create('reservation', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->date('date_reserv');
			$table->integer('nbrPlace_reserv');
			$table->string('etat_reserv', 255);
			$table->integer('user_id')->unsigned();
			$table->integer('voyage_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('reservation');
	}
}