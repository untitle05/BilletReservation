<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration
{

	public function up()
	{
		Schema::table('reservation', function (Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
				->onDelete('cascade')
				->onUpdate('cascade');
		});

		Schema::table('reservation', function (Blueprint $table) {
			$table->foreign('voyage_id')->references('id')->on('voyage')
				->onDelete('cascade')
				->onUpdate('cascade');
		});
		Schema::table('voyage', function (Blueprint $table) {
			$table->foreign('vehicule_id')->references('id')->on('vehicule')
				->onDelete('cascade')
				->onUpdate('cascade');
		});
		Schema::table('voyage', function (Blueprint $table) {
			$table->foreign('destination_id')->references('id')->on('destination')
				->onDelete('cascade')
				->onUpdate('cascade');
		});


		Schema::table('arrets', function (Blueprint $table) {
			$table->foreign('destination_id')->references('id')->on('destination')
				->onDelete('cascade')
				->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('reservation', function (Blueprint $table) {
			$table->dropForeign('reservation_user_id_foreign');
		});

		Schema::table('reservation', function (Blueprint $table) {
			$table->dropForeign('reservation_voyage_id_foreign');
		});
		Schema::table('voyage', function (Blueprint $table) {
			$table->dropForeign('voyage_vehicule_id_foreign');
		});

		Schema::table('voyage', function (Blueprint $table) {
			$table->dropForeign('voyage_destination_id_foreign');
		});

		Schema::table('arrets', function (Blueprint $table) {
			$table->dropForeign('arrets_destination_id_foreign');
		});
	}
}
