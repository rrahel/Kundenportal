@extends('admin_template') @section('content')

<p class="hidden">{{$page_title = "Hosting Vertrag bearbeiten"}}</p>

<div class="container" role="main">

	<div class="row">
		<div class="col-md-8 col-md-offset-2">


			<!-- Display Validation Errors -->
			@include('common.errors')

			<!-- New Bill Form -->
			<form action="/updateHosting/{{$contract->id}}" method="POST"
				class="form-horizontal" enctype="multipart/form-data">
				{{ csrf_field() }}

				<fieldset>


					<!-- 		client          -->

					<div class="form-group">
						<label for="contract-client" class="col-md-2 control-label">Kunde</label>
						<div class="col-md-10">
							<input class="form-control" id="contract-client" type="text"
								required="true" title="Required field!" name="client"
								value="{{$contract->client}}" readonly>
						</div>
					</div>

					<! ----------------  name ---------------- -->
					<div class="form-group">
						<label for="contract-name" class="col-md-2 control-label">Name</label>
						<div class="col-md-10">
							<input class="form-control" id="contract-name" type="text"
								required="true" title="Required field!" name="name"
								value="{{$contract->name}}">
						</div>
					</div>

					<! ----------------  von ---------------- -->
					<div class="form-group">
						<label for="contract-von" class="col-md-2 control-label">Von</label>
						<div class="col-md-10">
							<input class="form-control datepicker" id="contract-von"
								type="text" required="true" title="Required field!" name="von"
								value="{{$contract->von}}" readonly>
						</div>
					</div>

					<! ----------------  bis ---------------- -->
					<div class="form-group">
						<label for="contract-bis" class="col-md-2 control-label">Bis</label>
						<div class="col-md-10">
							<input class="form-control datepicker" id="contract-bis"
								type="text" required="true" title="Required field!" name="bis"
								value="{{$contract->bis}}" readonly>

						</div>
					</div>
					<! ----------------  bezahlt bis ---------------- -->
					<div class="form-group">
						<label for="contract-bezahlt_bis" class="col-md-2 control-label">Bezahlt
							bis</label>
						<div class="col-md-10">
							<input class="form-control datepicker" id="contract-bezahlt_bis"
								type="text" required="true" title="Required field!"
								name="bezahlt_bis" value="{{$contract->bezahlt_bis}}" readonly>
						</div>
					</div>
					<! ---------------- mindestvertragslaufzeit ---------------- -->
					<div class="form-group">
						<label for="contract-mindestvertragslaufzeit"
							class="col-md-2 control-label">Mindest- vertragslaufzeit</label>
						<div class="col-md-10">
							<input class="form-control datepicker"
								id="contract-mindestvertragslaufzeit" type="text"
								required="true" title="Required field!"
								name="mindestvertragslaufzeit"
								value="{{$contract->mindestvertragslaufzeit}}" readonly>
						</div>
					</div>


					<! ----------------  Hosting ---------------- -->

					<input hidden id="contract-hosting" type="checkbox" required="true"
						title="Required field!" name="hosting" checked="checked" value="1">


					<!-- 			File upload				 -->

					<div class="form-group">
						<label for="contract-file" class="col-md-2 control-label">Datei</label>
						<div class="col-md-10">
							<input class="form-control" id="contract-file" type="text"
								required="true" title="Required field!" name="filefield"
								value="{{ $contract->original_filename}}" readonly>
						</div>
					</div>


					<!-- Add Contract Button -->
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-6" style="margin-left: 17%;">
							<button type="submit" class="btn btn-default">
								<i class="fa fa-btn fa-plus"></i> Aktualisieren
							</button>
						</div>
					</div>

				</fieldset>
			</form>
		</div>
	</div>
</div>
@endsection


