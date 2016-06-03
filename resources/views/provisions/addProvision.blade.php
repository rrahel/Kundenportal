@extends('admin_template') @section('content')

<p class="hidden">{{$page_title = "Provision erstellen"}}</p>

<div class="container" role="main">

	<div class="row">
		<div class="col-md-8 col-md-offset-2">


			<!-- Display Validation Errors -->
			@include('common.errors')

			<!-- New Bill Form -->
			<form action="/provision" method="POST" class="form-horizontal"
				enctype="multipart/form-data">
				{{ csrf_field() }}

				<fieldset>
					<!-- 		partner         -->

					<div class="form-group">
						<label for="provision-partner" class="col-md-2 control-label">Partner</label>
						<div class="col-md-10">
							<select name="partner"> @foreach ($users as $user)
								<option>{{$user->name}}</option> @endforeach
							</select>
						</div>
					</div>

					<! ---------------- vertrag---------------- -->
					<div class="form-group">
						<label for="provision-vertrag" class="col-md-2 control-label">Vertrag</label>
						<div class="col-md-10">
							<input class="form-control" id="provision-vertrag" type="text"
								required="true" title="Required field!" name="vertrag"
								value="{{ old('provision') }}">
						</div>
					</div>

					<! ---------------- von---------------- -->
					<div class="form-group">
						<label for="provision-von" class="col-md-2 control-label">Von</label>
						<div class="col-md-10">
							<input class="form-control datepicker" id="provision-von"
								type="text" required="true" title="Required field!" name="von"
								readonly value="{{ old('provision') }}">
						</div>
					</div>

					<! ---------------- bis---------------- -->
					<div class="form-group">
						<label for="provision-bis" class="col-md-2 control-label">Bis</label>
						<div class="col-md-10">
							<input class="form-control datepicker" id="provision-bis"
								type="text" required="true" title="Required field!" name="bis"
								readonly value="{{ old('provision') }}">
						</div>
					</div>

					<! ---------------- summe---------------- -->
					<div class="form-group">
						<label for="provision-summe" class="col-md-2 control-label">Summe</label>
						<div class="col-md-10">
							<input class="form-control" id="provision-summe" type="number"
								step="any" min="0" required="true" title="Required field!"
								name="summe" value="{{ old('provision') }}">
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


