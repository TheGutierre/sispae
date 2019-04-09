<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEstagiosHasAreasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('estagios_has_areas', function(Blueprint $table)
		{
			$table->foreign('areas_id', 'fk_estagios_has_areas_areas1')->references('id')->on('areas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('estagios_id', 'fk_estagios_has_areas_estagios1')->references('id')->on('estagios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('estagios_has_areas', function(Blueprint $table)
		{
			$table->dropForeign('fk_estagios_has_areas_areas1');
			$table->dropForeign('fk_estagios_has_areas_estagios1');
		});
	}

}
