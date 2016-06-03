<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\Request;
use App\Bill;
use App\Http\Controllers\Controller;
use App\Repositories\BillRepository;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\DB;
use Mail;

class BillController extends Controller {
	// the bill repo instance
	protected $bills;
	public function __construct(BillRepository $bills) {
		$this->middleware ( 'auth' );
		$this->bills = $bills;
	}
	// display a list of all the user's bills
	public function index(Request $request) {
		$user = Auth::User ();
		if ($user->hasRole ( 'Admin' )) {
			return view ( 'bills.index', [ 
					'bills' => $this->bills->forAdmin ( $request->user () ) 
			] );
		} else {
			return view ( 'bills.index', [ 
					'bills' => $this->bills->forClient ( $request->user () ) 
			] );
		}
	}
	public function add() {
		$users = User::all ();
		return view ( 'bills.addBill', [ 
				'users' => $users 
		] );
	}
	public function edit($id) {
		$bill = Bill::findOrFail ( $id );
		$users = User::all ();
		return view ( 'bills.editBill', [ 
				'bill' => $bill,
				'users' => $users 
		] );
	}
	public function update($id, Request $request) {
		$bill = Bill::findOrFail ( $id );
		$input = $request->all ();
		$bill->fill ( $input )->save ();
		return redirect ( '/bills' );
	}
	// create a new bill
	public function store(Request $request) {		
		$user = Auth::User ();		
		$file = $request->file ( 'filefield' );
		$extension = $file->getClientOriginalExtension ();
		Storage::disk ( 'local' )->put ( $file->getFilename () . '.' . $extension, File::get ( $file ) );
		$entry = new Bill ();
		$entry->user_id = $user->id;
		$entry->client = $request->client;
		$entry->name = $request->name;
		$entry->mime = $file->getClientMimeType ();
		$entry->original_filename = $file->getClientOriginalName ();
		$entry->filename = $file->getFilename () . '.' . $extension;
		
		$kunde = DB::table ( 'users' )->select ('users.email')->where('users.name', '=' , $request->client)->first();
		//dd($kunde->email);
		
		
		// send mail
		Mail::send ( 'emails.neueRechnung', array (), function ($message) use ($kunde){
			$message->to ($kunde->email, 'Kunden Portal' )->subject ( 'Neue Rechnung' );
		} );
			
		$entry->save ();
		return redirect ( '/bills' );
	}
	public function get($filename) {
		$user = Auth::User ();
		$entry = Bill::where ( 'filename', '=', $filename )->firstOrFail ();		
		if($user->id == $entry->user_id){
			$file = Storage::disk ( 'local' )->get ( $entry->filename );
			$path = storage_path () . '/app/' . $entry->filename;
			return Response::download ( $path, $entry->original_filename, [ 
					'Content-Length: ' . filesize ( $path ) 
			] );	
		}else{
			return redirect ()->guest ( '404' );
		}
		
	}
	// delete a bill
	public function destroy(Request $request, Bill $bill) {
		$this->authorize ( 'destroy', $bill );
		Storage::Delete ( $bill->filename );
		$bill->delete ();
		return redirect ( '/bills' );
	}
}