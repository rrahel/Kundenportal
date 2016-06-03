@extends('admin_template') @section('content')

<p class="hidden">{{$page_title = "Wartungs Angebot erstellen"}}</p>

<div class="container" role="main">

	<div class="row">
		<div class="col-md-8 col-md-offset-2">


			<!-- Display Validation Errors -->
			@include('common.errors')

			<!-- New Bill Form -->
			<form action="serviceOffer" method="POST" class="form-horizontal"
				enctype="multipart/form-data">
				{{ csrf_field() }}

				<fieldset>


					<! ----------------  Menge ---------------- -->
					<div class="form-group">
						<label for="offer-menge" class="col-md-2 control-label">Menge</label>
						<div class="col-md-10">
							<input class="form-control" id="offer-menge" type="text"
								required="true" title="Required field!" name="menge"
								value="{{Request::old('menge') }}">
						</div>
					</div>

					<! ----------------  beschreibung ---------------- -->
					<div class="form-group">
						<label for="offer-beschreibung" class="col-md-2 control-label">Beschreibung</label>
						<div class="col-md-10">
							<textarea class="form-control" id="offer-beschreibung" rows="15"
								type="text" required="true" title="Required field!"
								name="beschreibung" value="{{ Request::old('beschreibung') }}"></textarea>
						</div>
					</div>

					<! ---------------- einzelpreis ---------------- -->
					<div class="form-group">
						<label for="offer-einzelpreis" class="col-md-2 control-label">Einzelpreis</label>
						<div class="col-md-10">
							<input class="form-control" id="offer-einzelpreis" type="number"
								step="any" min="0" required="true" title="Required field!"
								name="einzelpreis" value="{{Request::old('einzelpreis') }}">
						</div>
					</div>
					<! ----------------  service ---------------- -->

					<input hidden id="offer-service" type="checkbox" required="true"
						title="Required field!" name="service" checked="checked" value="1">



					<!-- 			Steuern				 -->

					<div class="form-group">
						<label for="offer-steuern" class="col-md-2 control-label">Steuern</label>
						<div class="col-md-10">
							<input class="form-control" id="offer-steuern" type="number"
								step="any" min="0" required="true" title="Required field!"
								name="steuern" value="{{Request::old('steuern') }}">
						</div>
					</div>

					<! ----------------  preis ---------------- -->
					<div class="form-group">
						<label for="offer-preis" class="col-md-2 control-label">Preis</label>
						<div class="col-md-10">
							<input class="form-control" id="offer-preis" type="number"
								step="any" min="0" required="true" title="Required field!"
								name="preis" value="{{Request::old('preis') }}">
						</div>
					</div>

					<!-- Add Contract Button -->
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-6" style="margin-left: 17%;">
							<button type="submit" class="btn btn-default">
								<i class="fa fa-btn fa-plus"></i> Erstellen
							</button>
						</div>
					</div>

				</fieldset>
			</form>
		</div>
	</div>
</div>
@endsection


