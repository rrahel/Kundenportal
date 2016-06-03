<?php

namespace App\Http\Controllers;

use App\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Response;

class InfoController extends Controller {
	public function __construct() {
		$this->middleware ( 'auth' );
	}
	public function index(Request $request) {
		$infos = Info::all ();
		return view ( 'infos.index', [ 
				'infos' => $infos 
		] );
	}
	public function add() {
		return view ( 'infos.addInfo' );
	}
	public function store(Request $request) {
		$file = $request->file ( 'filefield' );
		$extension = $file->getClientOriginalExtension ();
		Storage::disk ( 'local' )->put ( $file->getFilename () . '.' . $extension, File::get ( $file ) );
		$entry = new Info ();
		$entry->beschreibung = $request->beschreibung;
		$entry->mime = $file->getClientMimeType ();
		$entry->original_filename = $file->getClientOriginalName ();
		$entry->filename = $file->getFilename () . '.' . $extension;
		$entry->save ();
		return redirect ( '/infos' );
	}
	public function get($filename) {
		$entry = Info::where ( 'filename', '=', $filename )->firstOrFail ();
		$file = Storage::disk ( 'local' )->get ( $entry->filename );
		$path = storage_path () . '/app/' . $entry->filename;
		return Response::download ( $path, $entry->original_filename, [ 
				'Content-Length: ' . filesize ( $path ) 
		] );
	}
	public function destroy(Request $request, Info $info) {
		Storage::Delete ( $info->filename );
		$info->delete ();
		return redirect ( '/infos' );
	}
}
