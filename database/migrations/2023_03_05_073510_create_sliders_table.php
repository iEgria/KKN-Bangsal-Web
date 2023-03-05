<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up()
	{
		Schema::create('slider', function (Blueprint $table) {
			$table->uuid('id');
			$table->string('image');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('slider');
	}
};
