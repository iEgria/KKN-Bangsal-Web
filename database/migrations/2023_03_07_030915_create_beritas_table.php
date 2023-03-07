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
		Schema::create('berita', function (Blueprint $table) {
			$table->uuid('id');
			$table->string('title');
			$table->string('slug');
			$table->string('cover');
			$table->text('content');
			$table->integer('view')->default(0);
			$table->date('published_at');
			$table->softDeletes();
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
		Schema::drop('berita');
	}
};
