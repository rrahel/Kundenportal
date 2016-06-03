@extends('admin_template') @section('content')

<p class="hidden">{{$page_title = "Download erstellen"}}</p>

<div class="container" role="main">

	<div class="row">
		<div class="col-md-8 col-md-offset-2">


			<!-- Display Validation Errors -->
			@include('common.errors')

			<!-- New Bill Form -->
			<form action="/info" method="POST" class="form-horizontal"
				enctype="multipart/form-data">
				{{ csrf_field() }}

				<fieldset>


					<! ----------------  beschreibung ---------------- -->
					<div class="form-group">
						<label for="info-beschreibung" class="col-md-2 control-label">Beschreibung</label>
						<div class="col-md-10">
							<input class="form-control" id="info-beschreibung" type="text"
								required="true" title="Required field!" name="beschreibung"
								value="{{ old('info') }}">
						</div>
					</div>

					<!-- 			File upload				 -->

					<div class="form-group">
						<label for="info-file" class="col-md-2 control-label">Datei</label>
						<div class="col-md-10">
							<input class="form-control" id="info-file" type="file"
								required="true" title="Required field!" name="filefield"
								value="{{ old('info') }}">
						</div>
					</div>


					<!-- Add info Button -->
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


