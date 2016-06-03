@extends('admin_template') @section('content')
<p class="hidden">{{$page_title = "Rechnung erstellen"}}</p>

<div class="container" role="main">

	<div class="row">
		<div class="col-md-8 col-md-offset-2">

			@include('common.errors')

			<!-- New Bill Form -->
			<form action="/bill" method="POST" class="form-horizontal"
				enctype="multipart/form-data">
				{{ csrf_field() }}

				<fieldset>


					<! ----------------  name ---------------- -->
					<div class="form-group">
						<label for="bill-name" class="col-md-2 control-label">Name</label>
						<div class="col-md-10">
							<input class="form-control" id="bill-name" type="text"
								required="true" title="Required field!" name="name"
								value="{{Request::old('name') }}">
						</div>

					</div>

					<!-- 			File upload				 -->

					<div class="form-group">
						<label for="bill-file" class="col-md-2 control-label">Datei</label>
						<div class="col-md-10">
							<input class="form-control" id="bill-file" type="file"
								required="true" title="Required field!" name="filefield"
								value="{{Request::old('bill') }}">
						</div>
					</div>
					<!-- 		client          -->

					<div class="form-group">
						<label for="bill-client" class="col-md-2 control-label">Kunde</label>
						<div class="col-md-10">
							<select name="client"> @foreach ($users as $user)
								<option>{{$user->name}}</option> @endforeach
							</select>
						</div>
					</div>

					<!-- Add Bill Button -->
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


