<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use App\PartnerOffer;

class PartnerOffers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partnerOffers', function(Blueprint $table){
        	$table->increments ( 'id' );
        	$table->integer('user_id')->index();
        	$table->string ( 'angebotId' );
        	$table->string ( 'firma' );
        	$table->string ( 'filename' );
//         	$table->string ( 'mime' );
//         	$table->string ( 'original_filename' );
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
        //
    }
}
