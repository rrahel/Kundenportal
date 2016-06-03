@extends('admin_template') @section('content')

<p class="hidden">{{$page_title = "Provisionen"}}</p>



<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">

				<!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
					<table class="table table-hover dataTable">
						<thead>
							<tr>
							 @role('Partner')
								<th>Abgerechnet</th> @endrole
								<th>Kunde</th>
								<th>Vertrag</th>
								<th>Von</th>
								<th>Bis</th>
								<th style="text-align: right;">Summe</th> @role('Admin')
								<th>Actions</th> @endrole
							</tr>
						</thead>
						<tbody>
							@foreach ($provisions as $provision)
							<tr>@role('Partner')
								<td>@if($provision->abgerechnet == 1) <input type="checkbox"
									checked disabled> @else <input type="checkbox" disabled> @endif
								</td> @endrole
								<td>{{$provision->partner}}</td>
								<td>{{$provision->vertrag}}</td>
								<td>{{$provision->von}}</td>
								<td>{{$provision->bis}}</td>
								<td style="text-align: right;">€ {{number_format($provision->summe,2,',','')}}</td>
								 @role('Admin')
								<td>
									<form action="/provision/{{ $provision->id }}" method="POST">
										{{ csrf_field() }} {{ method_field('DELETE') }}

										<button type="submit"
											id="delete-provision-{{ $provision->id }}"
											class="btn btn-danger">Löschen</button>
										<a href="{{ url('/editProvision',$provision->id) }}">
											<button type="button" class="btn btn-success">Bearbeten</button>
										</a>
									</form>

								</td> @endrole
							</tr>

							@endforeach
						</tbody>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>  @role('Partner')
							<td style="text-align: right;">Ges. Summe € {{number_format($gesSumme,2,',','')}}</td>
							@endrole
						</tr>
							<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td> 
							<td></td>
							@role('Partner')<td style="text-align: right;">Offene Provisionen € {{number_format($offeneProv,2,',','')}}</td> @endrole
							
						</tr>
						@role('Admin')
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td><a href="{{ url('/addProvision') }}">
									<button type="button" class="btn btn-success">Provision
										Erstellen</button>
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
