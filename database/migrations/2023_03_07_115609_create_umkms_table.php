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
		Schema::create('umkm', function (Blueprint $table) {
			$table->uuid('id');
			$table->string('photo');
			$table->string('pemilik');
			$table->string('usaha');
			$table->string('alamat');
			$table->string('no_telp');
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
		Schema::drop('umkm');
	}
};
