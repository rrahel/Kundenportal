<?php
use App\Http\Controllers\OfferController;
use App\User;

/*
 * |--------------------------------------------------------------------------
 * | Routes File
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you will register all of the routes in an application.
 * | It's a breeze. Simply tell Laravel the URIs it should respond to
 * | and give it the controller to call when that URI is requested.
 * |
 */

/*
 * |--------------------------------------------------------------------------
 * | Application Routes
 * |--------------------------------------------------------------------------
 * |
 * | This route group applies the "web" middleware group to every route
 * | it contains. The "web" middleware group is defined in your HTTP
 * | kernel and includes session state, CSRF protection, and more.
 * |
 */

// Password reset link request routes...
Route::get ( 'password/email', 'Auth\PasswordController@getEmail' );
Route::post ( 'password/email', 'Auth\PasswordController@postEmail' );

// Password reset routes...
Route::get ( 'password/reset/{token}', 'Auth\PasswordController@getReset' );
Route::post ( 'password/reset', 'Auth\PasswordController@postReset' );

	
	Route::get ( '/', function () {
		
		return view ( 'auth/login' );
	} )->middleware ( 'guest' );
	
	Route::get ( '404', function () {
		return view ( 'exceptions/404' );
	} );
	Route::get ( '500', function () {
		return view ( 'exceptions/500' );
	} );
	
	// shourtcut for the authentication routes
	Route::auth ();
	
	// rechnungen routes ==> 'Bill'
	Route::get ( '/bills', 'BillController@index' );
	// rechnung herunterladen
	Route::get ( '/bill/{filename}', [ 
			'as' => 'getBill',
			'uses' => 'BillController@get' 
	] );
	
	// hosting and wartung vertrage
	Route::get ( '/contract/{filename}', [ 
			'as' => 'getcontract',
			'uses' => 'ContractController@get' 
	] );
	Route::get ( '/sendMail/{contractId}', 'ContractController@sendMail' );
	Route::get ( '/sendMailUndo/{contractId}', 'ContractController@sendMailUndo' );
	
	// Hosting vertrag ==> 'hosting'
	Route::get ( '/hostings', 'ContractController@index' );
	
	// Wartung vertrag ==> 'Service'
	Route::get ( '/services', 'ContractController@indexService' );
	
	// Infos
	Route::get ( '/infos', 'InfoController@index' );
	Route::get ( '/info/{filename}', [ 
			'as' => 'getentry',
			'uses' => 'InfoController@get' 
	] );
	
	//user profile
	Route::get('/userProfile','UserController@getProfile');
	Route::post('/userProfile','UserController@updateProfile');
	
	// access only for admin
	Route::group ( [ 
			'middleware' => [ 
					'CheckForRole:Admin' 
			] 
	], function () {
		// Rechnungen ==> 'Bills'
		Route::get ( '/addBill', 'BillController@add' );
		Route::get ( '/editBill/{bill}', 'BillController@edit' );
		Route::post ( '/updateBill/{bill}', 'BillController@update' );
		Route::post ( '/bill', 'BillController@store' );
		Route::delete ( '/bill/{bill}', 'BillController@destroy' );
		// hosting Vertrage ==> 'Hosting'
		Route::get ( '/addHosting', 'ContractController@add' );
		Route::post ( '/hosting', 'ContractController@store' );
		Route::get ( '/editHosting/{contract}', 'ContractController@edit' );
		Route::post ( '/updateHosting/{contract}', 'ContractController@update' );
		Route::delete ( '/hosting/{contract}', 'ContractController@destroy' );
		// Wartung vertrag ==> 'Service'
		Route::get ( '/addService', 'ContractController@addService' );
		Route::post ( '/service', 'ContractController@storeService' );
		Route::get ( '/editService/{contract}', 'ContractController@editService' );
		Route::post ( '/updateService/{contract}', 'ContractController@updateService' );
		Route::delete ( '/service/{contract}', 'ContractController@destroyService' );
		// Hosting Angeboten ==> 'hostingOffers'
		Route::get ( '/hostingOffers', 'OfferController@indexH' );
		Route::get ( '/addHostingOffer', 'OfferController@addH' );
		Route::get ( '/editHostingOffer/{offer}', 'OfferController@editH');		
		Route::post ( '/updateHostingOffer/{offer}', 'OfferController@updateH');
		Route::post ( '/hostingOffer', 'OfferController@storeH' );		
		Route::delete ( '/hostingOffer/{offer}', 'OfferController@destroyH' );
		// Wartungs Angeboten ==> 'serviceOffers'
		Route::get ( '/serviceOffers', 'OfferController@indexS' );
		Route::get ( '/addServiceOffer', 'OfferController@addS' );
		Route::post ( '/serviceOffer', 'OfferController@storeS' );
		Route::get ( '/editServiceOffer/{offer}', 'OfferController@editS' );
		Route::post ( '/updateServiceOffer/{offer}', 'OfferController@updateS' );
		Route::delete ( '/serviceOffer/{offer}', 'OfferController@destroyS' );
		// list users
		Route::get ( '/listUsers', 'UserController@index' );
		Route::delete ( '/listUsers/{user}', 'UserController@destroy' );
		Route::get ( '/addUser', 'UserController@add' );
		Route::post ( '/listUser', 'UserController@store' );
		Route::get ( '/editUser/{user}', 'UserController@edit' );
		Route::post ( '/updateUser/{user}', 'UserController@update' );
		
		// infos
		Route::get ( '/addInfo', 'InfoController@add' );
		Route::post ( '/info', 'InfoController@store' );
		Route::delete ( '/info/{info}', 'InfoController@destroy' );
	} );
	
	// access partner und admin
	// routes for provisions
	Route::group ( [ 
			'middleware' => [ 
					'CheckForRole:Admin,Partner' 
			] 
	], function () {
		
		Route::get ( '/provisions', 'ProvisionController@index' );
		Route::get ( '/addProvision', 'ProvisionController@add' );
		Route::post ( '/provision', 'ProvisionController@store' );
		Route::post ( '/updateProvision/{provision}', 'ProvisionController@update' );
		Route::get ( '/editProvision/{provision}', 'ProvisionController@edit' );
		Route::delete ( '/provision/{provision}', 'ProvisionController@destroy' );
		
		// angebote
		Route::get ( '/allOffers', 'OfferController@listOrder' );
		Route::post ( '/allOffers', 'OfferController@saveOrder' );		
		//alle erstellte angeboten von Partner
		Route::get ( '/partnerOffers', 'OfferController@listPartnerOrder' );
		Route::get ( '/pOffer/{filename}', [
				'as' => 'getOffer',
				'uses' => 'OfferController@get'
		] );
		Route::delete ( '/partnerOffers/{pOffer}', 'OfferController@destroyPartnerOffers' );
	} );
