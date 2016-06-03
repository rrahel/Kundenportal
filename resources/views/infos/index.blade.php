@extends('admin_template') @section('content')

<p class="hidden">{{$page_title = "Downloads"}}</p>



<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">

				<!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
					<table class="table table-hover dataTable">
						<thead>
							<tr>
								<th>Beschreibung</th>
								<th>Datei</th> @role('Admin')
								<th>Actions</th> @endrole
							</tr>
						</thead>
						<tbody>
							@foreach ($infos as $info)
							<tr>
								<td>{{$info->beschreibung}}</td>
								<td><a href="{{route('getentry', $info->filename)}}"
									download="{{$info->original_filename}}">{{$info->original_filename}}</a>
								</td> @role('Admin')
								<td>
									<form action="/info/{{ $info->id }}" method="POST">
										{{ csrf_field() }} {{ method_field('DELETE') }}

										<button type="submit" id="delete-info-{{ $info->id }}"
											class="btn btn-danger">
											<i class="fa fa-btn fa-trash"></i>Löschen
										</button>

									</form>

								</td> @endrole
							</tr>

							@endforeach
						</tbody>
						@role('Admin')
						<tr>
							<td></td>
							<td></td>
							<td><a href="{{ url('/addInfo') }}">
									<button type="button" class="btn btn-success">Erstellen</button>
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
