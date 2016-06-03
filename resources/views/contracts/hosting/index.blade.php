@extends('admin_template') @section('content')

<p class="hidden">{{$page_title = "Hosting Vertrage"}}</p>



<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">

				<!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
					<table class="table table-hover dataTable">
						<thead>
							<tr>
								<th>Kunde</th>
								<th>Name</th>
								<th>Von</th>
								<th>Bis</th>
								<th>Bezahlt bis</th>
								<th>Mindestvertragslaufzeit</th>
								<th>Datei</th>
								<th>Kündigen</th> @role('Admin')
								<th>Actions</th> @endrole
							</tr>
						</thead>
						<tbody>
							@foreach ($contracts as $contract)
							<tr>
								<td>{{$contract->client}}</td>
								<td>{{$contract->name}}</td>
								<td>{{$contract->von}}</td>
								<td>{{$contract->bis}}</td>
								<td>{{$contract->bezahlt_bis}}</td>
								<td>{{$contract->mindestvertragslaufzeit}}</td>
								<td><a href="{{route('getcontract', $contract->filename)}}"
									download="{{$contract->original_filename}}">{{$contract->original_filename}}</a>
								</td>
								<?php
								$now = Carbon\Carbon::now ();
								$bis = Carbon\Carbon::parse ( $contract->bis );
								?>
								<td>@if($contract->gekuendigt == 0) <a
									href="{{ url('/sendMail', $contract->id) }}">
										@if($bis->gt($now)|| $contract->bis == '')										
										<button type="button" class="btn btn-success" id="kündigen">Kündigen</button>
										@else										
										<button type="button" class="btn btn-success" id="kündigen"
											disabled>Kündigen</button> @endif
								</a> @else <a href="{{ url('sendMailUndo', $contract->id) }}">
										@if($bis->gt($now))
										<button type="button" class="btn btn-danger">Wiederherstellen</button>
										@else
										<button type="button" class="btn btn-danger" disabled>Wiederherstellen</button>@endif
								</a> @endif
								</td> @role('Admin')
								<td>
									<form action="/hosting/{{ $contract->id }}" method="POST">
										{{ csrf_field() }} {{ method_field('DELETE') }}

										<button type="submit" id="delete-contract-{{ $contract->id }}"
											class="btn btn-danger">Löschen</button>

										<a href="{{ url('/editHosting', $contract->id) }}">
											<button type="button" class="btn btn-success">Bearbeiten</button>
										</a>
									</form>
								</td> @endrole
							</tr>

							@endforeach @role('Admin')
						</tbody>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td><a href="{{ url('/addHosting') }}">
									<button type="button" class="btn btn-success">Hosting Vertrag erstellen</button>
							</a></td>
						</tr>
						@endrole
					</table>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
	</div>
</div>
@endsection
