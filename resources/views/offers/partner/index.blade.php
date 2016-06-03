@extends('admin_template') @section('content')

<p class="hidden">{{$page_title = "Angebote"}}</p>



<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">

				<!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
					<form method="POST" action="/allOffers">
						{{ csrf_field() }}
						<table class="table table-hover">
							<tr>
								<th></th>
								<th>Menge</th>
								<th>Beschreibung</th>
								<th>Einzelpreis</th>
								<th>Steuern</th>
								<th>Preis</th>
							</tr>
							@foreach ($offers as $offer)
							<tr>
								<td><input type="checkbox" name="checked[]"
									value="{{ $offer->id }}"></td>
								<td>{{$offer->menge}}</td>
								<td>{!! $offer->beschreibung !!}</td>
								<td>{{number_format($offer->einzelpreis,2,',','')}}</td>
								<td>{{$offer->steuern}}%</td>
								<td>€{{number_format($offer->preis,2,',','')}}</td>
							</tr>
							@endforeach
						</table>
						<hr style="border-width: 2px">
						<table class="table table-hover">
							<tr>

								<td><b>Kunde Info:</b></td>
								<td><input class="form-control" id="firma" type="text"
									title="Kunde Info" name="firma" placeholder="Firma"></td>
								<td><input class="form-control" id="kunde" type="text"
									title="Kunde Info" name="kunde" placeholder="Ansprechpartner"></td>

							</tr>
							<tr>

								<td></td>
								<td><input class="form-control" id="StNr" type="text"
									title="Kunde Addresse" name="stNr" placeholder="Straße/Nr."></td>
								<td><input class="form-control" id="plz" type="number"
									title="Kunde Addresse" name="plz" placeholder="PLZ"></td>
								<td><input class="form-control" id="ort" type="text"
									title="Kunde Addresse" name="ort" placeholder="Ort"></td>
								<td></td>
								<td><button type="submit" class="btn btn-default">Erstellen</button></td>

							</tr>
						</table>
					</form>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
	</div>
</div>
@endsection
