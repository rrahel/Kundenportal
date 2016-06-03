@extends('admin_template') @section('content')

<p class="hidden">{{$page_title = "Rechnung bearbeiten"}}</p>

<div class="container" role="main">

	<div class="row">
		<div class="col-md-8 col-md-offset-2">


			<!-- Display Validation Errors -->
			@include('common.errors')

			<!-- New Bill Form -->
			<form action="/updateBill/{{$bill->id}}" method="POST"
				class="form-horizontal" enctype="multipart/form-data">
				{{ csrf_field() }}

				<fieldset>
					<!--	name  -->
					<div class="form-group">
						<label for="bill-name" class="col-md-2 control-label">Name</label>
						<div class="col-md-10">
							<input class="form-control" id="bill-name" type="text"
								required="true" title="Required field!" name="name"
								value="{{$bill->name}}">
						</div>
					</div>

					<!-- 			File upload				 -->

					<div class="form-group">
						<label for="bill-file" class="col-md-2 control-label">Datei</label>
						<div class="col-md-10">
							<input class="form-control" id="bill-file" type="text"
								required="true" title="Required field!" name="filefield"
								value="{{$bill->original_filename}}" readonly>
						</div>
					</div>
					<!-- 		client          -->

					<div class="form-group">
						<label for="bill-client" class="col-md-2 control-label">Kunde</label>
						<div class="col-md-10">
							<input class="form-control" id="bill-client" type="text"
								required="true" title="Required field!" name="client"
								value="{{$bill->client}}" readonly>
						</div>
					</div>




					<!-- Add Bill Button -->
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-6" style="margin-left: 17%;">
							<button type="submit" class="btn btn-default">
								<i class="fa fa-btn fa-plus"></i> Aktualisiren
							</button>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>
@endsection


