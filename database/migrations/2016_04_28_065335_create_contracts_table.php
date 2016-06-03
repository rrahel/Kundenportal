<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateContractsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create ( 'contracts', function (Blueprint $table) {
			$table->increments ( 'id' );
			$table->integer ( 'user_id' )->index ();
			$table->string('client');
			$table->string ( 'name' );
			$table->string ( 'von' );
			$table->string ( 'bis' );
			$table->string ( 'bezahlt_bis' );
			$table->string ('mindestvertragslaufzeit');
			$table->boolean ( 'hosting' );
			$table->boolean ( 'service' );
			$table->string ( 'filename' );
			$table->string ( 'mime' );
			$table->string ( 'original_filename' );
			$table->boolean('gekuendigt');
			$table->timestamps ();
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop ( 'contracts' );
	}
}
