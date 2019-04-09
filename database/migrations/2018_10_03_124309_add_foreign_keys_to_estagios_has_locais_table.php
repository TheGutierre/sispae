<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEstagiosHasLocaisTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('estagios_has_locais', function(Blueprint $table)
		{
			$table->foreign('estagios_id', 'fk_estagios_has_locais_estagios1')->references('id')->on('estagios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('locais_id', 'fk_estagios_has_locais_locais1')->references('id')->on('locais')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('estagios_has_locais', function(Blueprint $table)
		{
			$table->dropForeign('fk_estagios_has_locais_estagios1');
			$table->dropForeign('fk_estagios_has_locais_locais1');
		});
	}

}
