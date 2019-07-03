<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('reservation', function(Blueprint $table) {
			$table->foreign('voyage_id')->references('id')->on('voyage')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('voyage', function(Blueprint $table) {
			$table->foreign('id_vehicule')->references('id')->on('vehicule')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('voyage', function(Blueprint $table) {
			$table->foreign('id_destination')->references('id')->on('destination')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('reservation', function(Blueprint $table) {
			$table->dropForeign('reservation_voyage_id_foreign');
		});
		Schema::table('voyage', function(Blueprint $table) {
			$table->dropForeign('voyage_id_vehicule_foreign');
		});
		Schema::table('voyage', function(Blueprint $table) {
			$table->dropForeign('voyage_id_destination_foreign');
		});
	}
}