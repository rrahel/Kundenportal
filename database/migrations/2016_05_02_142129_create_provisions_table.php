<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create ( 'provisions', function (Blueprint $table) {
    		$table->increments ( 'id' );
    		$table->integer('user_id')->index();
    		$table->string ( 'partner' );
    		$table->string ( 'vertrag' );
    		$table->string ( 'von' );
    		$table->string ( 'bis' );
    		$table->double ( 'summe' );
    		$table->boolean('abgerechnet');
    		$table->timestamps ();
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::drop ( 'provisions' );
    }
}
