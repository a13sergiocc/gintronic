<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payments', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');

			$table->integer('user_id')->unsigned()->index();
			$table->foreign('user_id')->references('id')->on('users');

			$table->integer('service_id')->unsigned()->index();
			$table->foreign('service_id')->references('id')->on('services');

			$table->decimal('fee', 4, 2);

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
		Schema::drop('payments');
	}

}
