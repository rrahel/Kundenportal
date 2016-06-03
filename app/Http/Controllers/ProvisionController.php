<?php

namespace App\Http\Controllers;

use App\Provisions;
use App\Repositories\ProvisionRepository;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProvisionController extends Controller {
	protected $provisions;
	public function __construct(ProvisionRepository $provisions) {
		$this->middleware ( 'auth' );
		$this->provisions = $provisions;
	}
	public function index(Request $request) {
		
		$user = Auth::User ();
		$arrSumme=array();
		$summen = DB::table('provisions')->select(DB::raw("SUM(summe) as summen"))->where('partner', $user->name)->first();
		$offeneProv = DB::table('provisions')->select(DB::raw("SUM(summe) as summe"))->where('partner', $user->name,'&&', 'abgerechnet = 0 &&')->first();
		if ($user->hasRole ( 'Admin' )) {
			return view ( 'provisions.index', [ 
					'provisions' => $this->provisions->forAdmin ( $request->user () ) 
			] );
		}
		if ($user->hasRole ( 'Partner' )) {			
			return view ( 'provisions.index', [ 
					'provisions' => $this->provisions->forPartner ( $request->user () ),
					'gesSumme' => $summen->summen,
					'offeneProv' => $offeneProv->summe
			] );
		}
	}
	public function add() {
		$users = User::all ();
		return view ( 'provisions.addProvision', [ 
				'users' => $users 
		] );
	}
	public function edit($id) {
			$provision = Provisions::findOrFail ( $id );
			$users = User::all ();
			return view ( 'provisions.editProvision', [ 
					'provision' => $provision,
					'users' => $users 
			] );
	}
	public function update($id, Request $request) {
			$provison = Provisions::findOrFail ( $id );
			$this->validate ( $request, [ 
					'partner' => 'required',
					'vertrag' => 'required',
					'von' => 'required',
					'bis' => 'required',
					'summe' => 'required' 
			] );
			$input = $request->all ();
			$provison->fill ( $input )->save ();
// 			dd($input);
			return redirect ( '/provisions' );
	}
	public function store(Request $request) {
			$user = Auth::User ();
			$entry = new Provisions ();
			$entry->user_id = $user->id;
			$entry->partner = $request->partner;
			$entry->vertrag = $request->vertrag;
			$entry->von = $request->von;
			$entry->bis = $request->bis;
			$entry->summe = $request->summe;
			$entry->save ();
			return redirect ( '/provisions' );
	}
	public function destroy(Request $request, Provisions $provision) {
			$this->authorize ( 'destroy', $provision );
			$provision->delete ();
			return redirect ( '/provisions' );
	}
}
