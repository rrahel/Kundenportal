<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateOffersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create ( 'offers', function (Blueprint $table) {
			$table->increments ( 'id' );
			$table->integer ( 'user_id' )->index ();
			$table->string ( 'menge' );
			$table->string ( 'beschreibung' );
			$table->double( 'einzelpreis',15,2 );
			$table->double( 'steuern',15,2 );
			$table->double( 'preis',15,2);
			$table->boolean ( 'hosting' );
			$table->boolean ( 'service' );
			$table->timestamps ();
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop ( 'offers' );
	}
}
