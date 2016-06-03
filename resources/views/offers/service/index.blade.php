@extends('admin_template') @section('content')

<p class="hidden">{{$page_title = "Wartungs Angebote"}}</p>



<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">

				<!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
					<table class="table table-hover dataTable">
						<thead>
							<tr>
								<th>Menge</th>
								<th>Beschreibung</th>
								<th>Einzelpreis</th>
								<th>Steuern</th>
								<th>Preis</th> @role('Admin')
								<th>Actions</th> @endrole
							</tr>
						</thead>
						<tbody>
							@foreach ($offers as $offer)
							<tr>
								<td>{{$offer->menge}}</td>
								<td>{!! $offer->beschreibung !!}</td>
								<td>{{number_format($offer->einzelpreis,2,',','')}}</td>
								<td>{{$offer->steuern}}%</td>
								<td>{{number_format($offer->preis,2,',','')}}</td>
								@role('Admin')
								<td>
									<form action="/serviceOffer/{{ $offer->id }}" method="POST">
										{{ csrf_field() }} {{ method_field('DELETE') }}

										<button type="submit" id="delete-offer-{{ $offer->id }}"
											class="btn btn-danger">Löschen</button>
										<a href="{{ url('/editServiceOffer', $offer->id) }}">
											<button type="button" class="btn btn-success">Bearbeiten</button>
										</a>
									</form>
								</td> @endrole
							</tr>

							@endforeach
						</tbody>
						@role('Admin')
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td><a href="{{ url('/addServiceOffer') }}">
									<button type="button" class="btn btn-success">Wartungs Angebot erstellen</button>
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
