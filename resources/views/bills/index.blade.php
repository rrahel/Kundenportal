@extends('admin_template') @section('content')

<p class="hidden">{{$page_title = "Rechnungen"}}</p>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">

				<div class="box-body table-responsive no-padding">
					<table class="table table-hover dataTable">
						<thead>
							<tr>
								<th>Kunde</th>
								<th>Name</th>
								<th>Datei</th> @role('Admin')
								<th>Actions</th> @endrole
							</tr>
						</thead>
						<tbody>
							@foreach ($bills as $bill)
							<tr>
								<td>{{$bill->client}}</td>
								<td>{{$bill->name}}</td>
								<td><a href="{{route('getBill', $bill->filename)}}"
									download="{{$bill->original_filename}}">{{$bill->original_filename}}</a>
								</td> @role('Admin')
								<td>
									<form action="/bill/{{ $bill->id }}" method="POST">
										{{ csrf_field() }} {{ method_field('DELETE') }}

										<button type="submit" id="delete-bill-{{ $bill->id }}"
											class="btn btn-danger">Löschen</button>
										<a href="{{ url('/editBill',$bill->id) }}">
											<button type="button" class="btn btn-success">Bearbeten</button>
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
							<td><a href="{{ url('/addBill') }}">
									<button type="button" class="btn btn-success">Rechnung
										erstellen </button>
							</a></td>
						</tr>
						@endrole
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
