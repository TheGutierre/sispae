<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToContatosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contatos', function(Blueprint $table)
		{
			$table->foreign('empresas_id', 'fk_contatos_empresas1')->references('id')->on('empresas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('contatos', function(Blueprint $table)
		{
			$table->dropForeign('fk_contatos_empresas1');
		});
	}

}
