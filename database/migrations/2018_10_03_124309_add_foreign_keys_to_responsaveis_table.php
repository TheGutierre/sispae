<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToResponsaveisTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('responsaveis', function(Blueprint $table)
		{
			$table->foreign('empresas_id', 'fk_responsaveis_empresas1')->references('id')->on('empresas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('users_id', 'fk_responsaveis_users')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('responsaveis', function(Blueprint $table)
		{
			$table->dropForeign('fk_responsaveis_empresas1');
			$table->dropForeign('fk_responsaveis_users');
		});
	}

}
