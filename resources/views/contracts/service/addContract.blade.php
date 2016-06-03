@extends('admin_template') @section('content')

<p class="hidden">{{$page_title = "Wartung Vertrag erstellen"}}</p>

<div class="container" role="main">

	<div class="row">
		<div class="col-md-8 col-md-offset-2">


			<!-- Display Validation Errors -->
			@include('common.errors')

			<!-- New Bill Form -->
			<form action="service" method="POST" class="form-horizontal"
				enctype="multipart/form-data">
				{{ csrf_field() }}

				<fieldset>


					<! ----------------  name ---------------- -->
					<div class="form-group">
						<label for="contract-name" class="col-md-2 control-label">Name</label>
						<div class="col-md-10">
							<input class="form-control" id="contract-name" type="text"
								required="true" title="Required field!" name="name"
								value="{{ Request::old('name')  }}">
						</div>
					</div>

					<! ----------------  von ---------------- -->
					<div class="form-group">
						<label for="contract-von" class="col-md-2 control-label">Von</label>
						<div class="col-md-10">
							<input class="form-control datepicker" id="contract-von"
								type="text" name="von" value="{{ Request::old('von')  }}"
								readonly>
						</div>
					</div>

					<! ----------------  bis ---------------- -->
					<div class="form-group">
						<label for="contract-bis" class="col-md-2 control-label">Bis</label>
						<div class="col-md-10">
							<input class="form-control datepicker" id="contract-bis"
								type="text" name="bis" value="{{ Request::old('bis')  }}"
								readonly>
						</div>
					</div>
					<! ----------------  bezahlt_bis ---------------- -->
					<div class="form-group">
						<label for="contract-bezahlt_bis" class="col-md-2 control-label">Bezahlt
							bis</label>
						<div class="col-md-10">
							<input class="form-control datepicker" id="contract-bezahlt_bis"
								type="text" required="true" title="Required field!"
								name="bezahlt_bis" value="{{ Request::old('bezahlt_bis')  }}"
								readonly>
						</div>
					</div>
					<! ----------------  mindestvertragslaufzeit ---------------- -->
					<div class="form-group">
						<label for="contract-mindestvertragslaufzeit"
							class="col-md-2 control-label">Mindest- vertragslaufzeit</label>
						<div class="col-md-10">
							<input class="form-control datepicker"
								id="contract-mindestvertragslaufzeit" type="text"
								required="true" title="Required field!"
								name="mindestvertragslaufzeit"
								value="{{ Request::old('mindestvertragslaufzeit')  }}" readonly>
						</div>
					</div>

					<!-- 		client          -->

					<div class="form-group">
						<label for="contract-client" class="col-md-2 control-label">Kunde</label>
						<div class="col-md-10">
							<select name="client"> @foreach ($users as $user)
								<option>{{$user->name}}</option> @endforeach
							</select>
						</div>
					</div>
					<! ----------------  Service ---------------- -->

					<input hidden id="contract-service" type="checkbox" required="true"
						title="Required field!" name="service" checked="checked" value="1">



					<!-- 			File upload				 -->

					<div class="form-group">
						<label for="contract-file" class="col-md-2 control-label">Datei</label>
						<div class="col-md-10">
							<input class="form-control" id="contract-file" type="file"
								required="true" title="Required field!" name="filefield"
								value="{{ Request::old('filefield')  }}">
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


