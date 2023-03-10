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
		Schema::create('general_information', function (Blueprint $table) {
			$table->increments('id');
			$table->string('email');
			$table->string('phone');
			$table->string('instagram');
			$table->integer('penduduk_pria')->default(0);
			$table->integer('penduduk_wanita')->default(0);
			$table->string('luas_wilayah')->default('');
			$table->longText('sejarah_desa');
			$table->longText('visi_misi');
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
		Schema::drop('general_information');
	}
};
