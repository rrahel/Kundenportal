@extends('admin_template') @section('content')

<p class="hidden">{{$page_title = "Benutzer bearbeiten"}}</p>

<div class="container" role="main">

	<div class="row">
		<div class="col-md-8 col-md-offset-2">


			<!-- Display Validation Errors -->
			@include('common.errors')

			<!-- New Bill Form -->
			<form action="/userProfile" method="POST" class="form-horizontal"
				enctype="multipart/form-data">
				{{ csrf_field() }}

				<fieldset>


					<! ----------------  firma ---------------- -->
					<div class="form-group">
						<label for="user-firma" class="col-md-2 control-label">Firma</label>
						<div class="col-md-10">
							<input class="form-control" id="user-firma" type="text"
								name="firma" value="{{$user->firma}}">
						</div>
					</div>
					<! ----------------  title ---------------- -->
					<div class="form-group">
						<label for="user-title" class="col-md-2 control-label">Title</label>
						<div class="col-md-10">
							<input class="form-control" id="user-title" type="text"
								name="title" value="{{$user->title}}">
						</div>
					</div>
					<! ----------------  name ---------------- -->
					<div class="form-group">
						<label for="user-name" class="col-md-2 control-label">Name</label>
						<div class="col-md-10">
							<input class="form-control" id="user-name" type="text"
								required="true" title="Required field!" name="name"
								value="{{$user->name}}">
						</div>
					</div>
					<! ----------------  email ---------------- -->
					<div class="form-group">
						<label for="user-email" class="col-md-2 control-label">E-Mail</label>
						<div class="col-md-10">
							<input class="form-control" id="user-email" type="email"
								required="true" title="Required field!" name="email"
								value="{{$user->email}}">
						</div>
					</div>
					<! ----------------  addresse ---------------- -->
					<div class="form-group">
						<label for="user-addresse" class="col-md-2 control-label">Straße/
							Nr.</label>
						<div class="col-md-10">
							<input class="form-control" id="user-addresse" type="text"
								required="true" title="Required field!" name="addresse"
								value="{{$user->addresse}}">
						</div>
					</div>
					<! ----------------  plz ---------------- -->
					<div class="form-group">
						<label for="user-plz" class="col-md-2 control-label">PLZ</label>
						<div class="col-md-10">
							<input class="form-control" id="user-plz" type="number"
								required="true" title="Required field!" name="plz"
								value="{{$user->plz}}">
						</div>
					</div>
					<div class="form-group">
						<label for="user-ort" class="col-md-2 control-label">Ort</label>
						<div class="col-md-10">
							<input class="form-control" id="user-ort" type="text"
								required="true" title="Required field!" name="ort"
								value="{{$user->ort }}">
						</div>
					</div>
					<! ----------------  uid ---------------- -->
					<div class="form-group">
						<label for="user-uid" class="col-md-2 control-label">UID</label>
						<div class="col-md-10">
							<input class="form-control" id="user-uid" type="number"
								name="uid" value="{{$user->uid}}">
						</div>
					</div>
					<! ----------------  tel ---------------- -->
					<div class="form-group">
						<label for="user-tel" class="col-md-2 control-label">Telefonnummer</label>
						<div class="col-md-10">
							<input class="form-control" id="user-tel" type="text" name="tel"
								value="{{$user->tel}}">
						</div>
					</div>

					<!-- Add Bill Button -->
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


