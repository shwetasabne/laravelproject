<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create("blogs", function(Blueprint $table)
        {
        $table->increments('id');
        $table->string('name', 100)->unique();
		$table->longText('description');
        $table->dateTime("created_at")->nullable()->default(null);
        $table->dateTime("updated_at")->nullable()->default(null);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::dropIfExists("blogs");
	}

}
