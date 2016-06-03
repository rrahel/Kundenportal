@extends('admin_template') @section('content')

<p class="hidden">{{$page_title = "Erstellte Angebote"}}</p>



<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">

				<div class="box-body table-responsive no-padding">
					<table class="table table-hover dataTable">
						<thead>
							<tr>
								@role('Admin')
								<th>Partner</th>@endrole
								<th>Angebot ID</th>
								<th>Firma</th>
								<th>Datei</th> @role('Admin')
								<th>Actions</th>@endrole

							</tr>
						</thead>
						<tbody>
							@foreach ($partnerOffers as $pOffer)
							<tr>
								@role('Admin')
								<td>{{$pOffer->user_name}}</td>@endrole
								<td>{{$pOffer->angebotId}}</td>
								<td>{{$pOffer->firma}}</td>
								<td><a href="{{route('getOffer', $pOffer->filename)}}"
									download="{{$pOffer->filename}}">{{$pOffer->filename}}</a></td>
								@role('Admin')
								<td>
									<form action="/partnerOffers/{{ $pOffer->id }}" method="POST">
										{{ csrf_field() }} {{ method_field('DELETE') }}

										<button type="submit" id="delete-pOffer-{{ $pOffer->id }}"
											class="btn btn-danger">Löschen</button>
									</form>
								</td> @endrole
							</tr>
							@endforeach
						</tbody>


					</table>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
	</div>
</div>
@endsection
