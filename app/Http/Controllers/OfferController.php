<?php

namespace App\Http\Controllers;

use App\Offer;
use App\PartnerOffer;
use App\Repositories\OfferRepository;
use App\User;
use Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Mail;
use Response;

class OfferController extends Controller {
	// the offer repo instance
	protected $offers;
	public function __construct(OfferRepository $offers) {
		$this->middleware ( 'auth' );
		$this->offers = $offers;
	}
	// -----hosting methods
	public function indexH(Request $request) {
		return view ( 'offers.hosting.index', [ 
				'offers' => $this->offers->forHosting () 
		] );
	}
	public function addH() {
		return view ( 'offers.hosting.addHostingOffer' );
	}
	public function storeH(Request $request) {
		$user = Auth::User ();
		$entry = new Offer ();
		$entry->user_id = $user->id;
		$entry->menge = $request->menge;
		$entry->beschreibung = $request->beschreibung;
		$entry->einzelpreis = $request->einzelpreis;
		$entry->steuern = $request->steuern;
		$entry->preis = $request->preis;
		$entry->hosting = $request->hosting;
		$entry->save ();
		//dd($entry);
		return redirect ( '/hostingOffers' );
	}
	
	public function editH($id) {
		$offer = Offer::findOrFail ( $id );
		return view ( 'offers.hosting.editHostingOffer', [ 
				'offer' => $offer 
		] );
	}
	public function updateH($id, Request $request) {
		$offer = Offer::findOrFail ( $id );
		$this->validate ( $request, [ 
				'menge' => 'required',
				'beschreibung' => 'required',
				'einzelpreis' => 'required',
				'steuern' => 'required',
				'preis' => 'required' 
		] );
		
		$input = $request->all ();
		$offer->fill ( $input )->save ();
		//dd($input);
		return redirect ( '/hostingOffers' );
	}
	
	public function destroyH(Request $request, Offer $offer) {
		$this->authorize ( 'destroy', $offer );
		$offer->delete ();
		return redirect ( '/hostingOffers' );
	}
	// -----------Service methods
	public function indexS(Request $request) {
		return view ( 'offers.service.index', [ 
				'offers' => $this->offers->forService () 
		] );
	}
	public function addS() {
		return view ( 'offers.service.addServiceOffer' );
	}
	public function storeS(Request $request) {
		$user = Auth::User ();
		$entry = new Offer ();
		$entry->user_id = $user->id;
		$entry->menge = $request->menge;
		$entry->beschreibung = $request->beschreibung;
		$entry->einzelpreis = $request->einzelpreis;
		$entry->steuern = $request->steuern;
		$entry->preis = $request->preis;
		$entry->service = $request->service;
		$entry->save ();
		return redirect ( '/serviceOffers' );
	}
	public function editS($id) {
		$offer = Offer::findOrFail ( $id );
		
		return view ( 'offers.service.editServiceOffer', [ 
				'offer' => $offer 
		] );
	}
	public function updateS($id, Request $request) {
		$offer = Offer::findOrFail ( $id );
		$this->validate ( $request, [ 
				'menge' => 'required',
				'beschreibung' => 'required',
				'einzelpreis' => 'required',
				'steuern' => 'required',
				'preis' => 'required' 
		] );
		$input = $request->all ();
		$offer->fill ( $input )->save ();
		return redirect ( '/serviceOffers' );
	}
	public function destroyS(Request $request, Offer $offer) {
		$this->authorize ( 'destroy', $offer );
		$offer->delete ();
		return redirect ( '/serviceOffers' );
	}
	// -------------------------partner features
	public function listOrder(Request $request) {
		$offers = Offer::all ();
		// dd($offers);
		return view ( 'offers.partner.index', [ 
				'offers' => $offers 
		] );
	}
	public function saveOrder(Request $request) {
		try {
			// get user input
			$preise = array ();
			$user = Auth::User ();
			$test = $request->only ( 'checked' ) ['checked'];
			$checked = Offer::findOrFail ( $test );
			foreach ( $checked as $check ) {
				$preise [] = $check->preis;
			}
			$summe = array_sum ( $preise );
			$steuern = $summe * (20 / 100);
			$total = $summe + $steuern;
			$firma = $request->firma;
			$kunde = $request->kunde;
			$stNr = $request->stNr;
			$plz = $request->plz;
			$ort = $request->ort;
			
			$currentDate = Carbon::now ();
			$validDate = Carbon::now ()->addDay ( 30 );
			$filename = 'AN' . $currentDate . '.pdf';
			$angebotId = 'AN' . $currentDate;
			
			// send mail
			Mail::send ( 'emails.angebot', array (
					'user' => $user->name,
					'kunde' => $kunde,
					'checked' => $checked,
					'angebotId' => $angebotId,
					'summe' => $summe,
					'currentDate' => $currentDate->toDateString (),
					'validDate' => $validDate->toDateString () 
			), function ($message) {
				$message->to ( 'rrahelcemi@gmail.com', 'Kunden Portal' )->subject ( 'Angebot bestellen' );
			} );
			
			// generate pdf
			$pdf = PDF::loadView ( 'offers.partner.pdf', array (
					'user' => $user->name,
					'checked' => $checked,
					'summe' => $summe,
					'steuern' => $steuern,
					'total' => $total,
					'firma' => $firma,
					'kunde' => $kunde,
					'stNr' => $stNr,
					'plz' => $plz,
					'ort' => $ort,
					'currentDate' => $currentDate->toDateString (),
					'validDate' => $validDate->toDateString (),
					'angebotId' => $angebotId 
			) );
			// save file
			$filename = 'AN' . $currentDate . '.pdf';
			Storage::disk ( 'local' )->put ( $filename, $pdf->output () );
			// store into db
			$user->PartnerOffers ()->create ( [ 
					'angebotId' => $angebotId,
					'firma' => $firma,
					'filename' => $filename 
			] );
			
			// download file
			$file = Storage::disk ( 'local' )->get ( $filename );
			$path = storage_path () . '/app/' . $filename;
			return Response::download ( $path, $filename, [ 
					'Content-Length: ' . filesize ( $path ) 
			] );
		} catch ( ModelNotFoundException $e ) {
			return redirect ( '/allOffers' );
		}
	}
	// list all created offers from partner
	public function listPartnerOrder(Request $request) {
		$user = Auth::User ();
		$partner = DB::table ( 'users' )->join ( 'partnerOffers', 'users.id', '=', 'partnerOffers.user_id' )->select ( 'users.name as user_name', 'partnerOffers.*' )->get ();
		if ($user->hasRole ( 'Admin' )) {
			return view ( 'offers.partner.partnerOffers', [ 
					'partnerOffers' => $partner 
			] );
		} else {
			return view ( 'offers.partner.partnerOffers', [ 
					'partnerOffers' => $this->offers->forPartner ( $request->user () ) 
			] );
		}
	}
	// download file
	public function get($filename) {
		$pOffer = PartnerOffer::where ( 'filename', '=', $filename )->firstOrFail ();
		$file = Storage::disk ( 'local' )->get ( $pOffer->filename );
		$path = storage_path () . '/app/' . $pOffer->filename;
		return Response::download ( $path, $pOffer->filename, [ 
				'Content-Length: ' . filesize ( $path ) 
		] );
	}
	public function destroyPartnerOffers(Request $request, PartnerOffer $pOffer) {
		$pOffer->delete ();
		return redirect ( '/partnerOffers' );
	}
}
