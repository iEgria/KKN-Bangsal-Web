<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rt_rw', function (Blueprint $table) {
			$table->uuid('id');
			$table->uuid('rt_rw_id')->nullable();
			$table->integer('rt_number')->nullable();
			$table->integer('rw_number')->nullable();
			$table->string('nama');
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
		Schema::drop('rt_rw');
	}
};
