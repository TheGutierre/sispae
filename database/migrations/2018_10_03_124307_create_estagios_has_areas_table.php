<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEstagiosHasAreasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('estagios_has_areas', function(Blueprint $table)
		{
			$table->integer('estagios_id')->index('fk_estagios_has_areas_estagios1_idx');
			$table->integer('areas_id')->index('fk_estagios_has_areas_areas1_idx');
			$table->primary(['estagios_id','areas_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('estagios_has_areas');
	}

}
