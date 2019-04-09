<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSubareaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('subarea', function(Blueprint $table)
		{
			$table->foreign('areas_id', 'fk_subarea_areas1')->references('id')->on('areas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('subarea', function(Blueprint $table)
		{
			$table->dropForeign('fk_subarea_areas1');
		});
	}

}
