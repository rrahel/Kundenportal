<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Http\Controllers\Controller;
use App\Repositories\ContractRepository;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Mail;
use Redirect;
use Response;

/**
 * this controller is for the hosting contracts and the service contracts.
 */
class ContractController extends Controller {
	// the contract repo instance
	protected $contracts;
	public function __construct(ContractRepository $contracts) {
		$this->middleware ( 'auth' );
		$this->contracts = $contracts;
	}
	// ------------------hosting methods------------
	// display a list of all the user's hosting contracts
	public function index(Request $request) {
		$user = Auth::User ();
		if ($user->hasRole ( 'Admin' )) {
			return view ( 'contracts.hosting.index', [ 
					'contracts' => $this->contracts->forHostingAdmin ( $request->user () ) 
			] );
		} else {
			return view ( 'contracts.hosting.index', [ 
					'contracts' => $this->contracts->forHostingClient ( $request->user () ) 
			] );
		}
	}
	public function add() {
		$users = User::all ();
		return view ( 'contracts.hosting.addHosting', [ 
				'users' => $users 
		] );
	}
	
	// create a new hosting contract
	public function store(Request $request) {
		$user = Auth::User ();
		$file = $request->file ( 'filefield' );
		$extension = $file->getClientOriginalExtension ();
		Storage::disk ( 'local' )->put ( $file->getFilename () . '.' . $extension, File::get ( $file ) );
		$entry = new Contract ();
		$entry->user_id = $user->id;
		$entry->client = $request->client;
		$entry->name = $request->name;
		$entry->von = $request->von;
		$entry->bis = $request->bis;
		$entry->bezahlt_bis = $request->bezahlt_bis;
		$entry->mindestvertragslaufzeit = $request->mindestvertragslaufzeit;
		$entry->hosting = $request->hosting;
		$entry->mime = $file->getClientMimeType ();
		$entry->original_filename = $file->getClientOriginalName ();
		$entry->filename = $file->getFilename () . '.' . $extension;
		$entry->save ();
		return redirect ( '/hostings' );
	}
	public function edit($id) {
		$contract = Contract::findOrFail ( $id );
		$users = User::all ();
		return view ( 'contracts.hosting.editHosting', [ 
				'contract' => $contract,
				'users' => $users 
		] );
	}
	public function update($id, Request $request) {
		$contract = Contract::findOrFail ( $id );
		$this->validate ( $request, [ 
				'name' => 'required',
				'von' => 'required',
				'bis' => 'required',
				'bezahlt_bis' => 'required',
				'mindestvertragslaufzeit' => 'required' 
		] );
		$contract->update ( $request->all () );
		return redirect ( '/hostings' );
	}
	// delete a contract
	public function destroy(Request $request, Contract $contract) {
		$this->authorize ( 'destroy', $contract );
		Storage::Delete ( $contract->filename );
		$contract->delete ();
		return redirect ( '/hostings' );
	}
	// -------------------Service methods ---------------------
	// display a list of all the user's service contracts
	public function indexService(Request $request) {
		$user = Auth::User ();
		if ($user->hasRole ( 'Admin' )) {
			return view ( 'contracts.service.index', [ 
					'contracts' => $this->contracts->forServiceAdmin ( $request->user () ) 
			] );
		} else {
			return view ( 'contracts.service.index', [ 
					'contracts' => $this->contracts->forServiceClient ( $request->user () ) 
			] );
		}
	}
	public function addService() {
		$users = User::all ();
		return view ( 'contracts.service.addContract', [ 
				'users' => $users 
		] );
	}
	// create a new service contract
	public function storeService(Request $request) {
		$user = Auth::User ();
		$file = $request->file ( 'filefield' );
		$extension = $file->getClientOriginalExtension ();
		Storage::disk ( 'local' )->put ( $file->getFilename () . '.' . $extension, File::get ( $file ) );
		$entry = new Contract ();
		$entry->user_id = $user->id;
		$entry->client = $request->client;
		$entry->name = $request->name;
		$entry->von = $request->von;
		$entry->bis = $request->bis;
		$entry->bezahlt_bis = $request->bezahlt_bis;
		$entry->mindestvertragslaufzeit = $request->mindestvertragslaufzeit;
		$entry->hosting = 0;
		$entry->service = $request->service;
		$entry->mime = $file->getClientMimeType ();
		$entry->original_filename = $file->getClientOriginalName ();
		$entry->filename = $file->getFilename () . '.' . $extension;
		$entry->save ();
		return redirect ( '/services' );
	}
	// delete a contract
	public function destroyService(Request $request, Contract $contract) {
		$this->authorize ( 'destroy', $contract );
		Storage::Delete ( $contract->filename );
		$contract->delete ();
		return redirect ( '/services' );
	}
	public function editService($id) {
		$contract = Contract::findOrFail ( $id );
		$users = User::all ();
		return view ( 'contracts.service.editService', [ 
				'contract' => $contract,
				'users' => $users 
		] );
	}
	public function updateService($id, Request $request) {
		$contract = Contract::findOrFail ( $id );
		$this->validate ( $request, [ 
				'name' => 'required',
				'von' => 'required',
				'bis' => 'required',
				'bezahlt_bis' => 'required',
				'mindestvertragslaufzeit' => 'required' 
		] );
		$input = $request->all ();
		$contract->fill ( $input )->save ();
		return redirect ( '/services' );
	}
	// -------------Methods for hosting and service-----------------
	// donload contract
	public function get($filename) {
		$user = Auth::User ();
		$contract = Contract::where ( 'filename', '=', $filename )->firstOrFail ();
		if($user->id == $contract->user_id){
			$file = Storage::disk ( 'local' )->get ( $contract->filename );
			
			$path = storage_path () . '/app/' . $contract->filename;
			
			return Response::download ( $path, $contract->original_filename, [ 
					'Content-Length: ' . filesize ( $path ) 
			] );
		}else{
			return redirect ()->guest ( '404' );
		}
	}
	public function sendMail(Request $request, $id) {
		$contract = Contract::findOrFail ( $id );
		$user = Auth::User ();
		$contract->gekuendigt = "1";
		$contract->save ();
		Mail::send ( 'emails.kuendigen', array (
				'user' => $user->name,
				'contract' => $contract->name 
		), function ($message) {
			$message->to ( 'rrahelcemi@gmail.com', 'Kunden Portal' )->subject ( 'Vertrag Kündigung' );
		} );
		return Redirect::back ();
	}
	public function sendMailUndo(Request $request, $id) {
		$contract = Contract::findOrFail ( $id );
		$user = Auth::User ();
		$contract->gekuendigt = "0";
		$contract->save ();
		Mail::send ( 'emails.wiederherstellen', array (
				'user' => $user->name,
				'contract' => $contract->name 
		), function ($message) {
			$message->to ( 'rrahelcemi@gmail.com', 'Kunden Portal' )->subject ( 'Vertrag Wiederherstellen' );
		} );
		return Redirect::back ();
	}
}
