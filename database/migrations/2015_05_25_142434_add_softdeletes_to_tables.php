<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSoftdeletesToTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('services', function(Blueprint $table)
		{
			$table->softDeletes();
		});
		Schema::table('payments', function(Blueprint $table)
		{
			$table->softDeletes();
		});
		Schema::table('contracts', function(Blueprint $table)
		{
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('services', function(Blueprint $table)
		{
			$table->dropSoftDeletes();
		});
		Schema::table('payments', function(Blueprint $table)
		{
			$table->dropSoftDeletes();
		});
		Schema::table('contracts', function(Blueprint $table)
		{
			$table->dropSoftDeletes();
		});
	}

}
