@extends('admin_template') @section('content') @role('Admin')
<p class="hidden">{{$page_title = "Benutzer"}}</p>



<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
					<table class="table table-hover dataTable">
						<thead>
							<tr>
								<th>Name</th>
								<th>Firma</th>
								<th>E-Mail</th>
								<th>Role</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($users as $user)
							<tr>
								<td>{{$user->name}}</td>
								<td>{{$user->firma}}</td>
								<td>{{$user->email}}</td>
								<td>{{$user->role_name}}</td>
								<td>
									<form action="/listUsers/{{ $user->id }}" method="POST">
										{{ csrf_field() }} {{ method_field('DELETE') }}

										<button type="submit" id="delete-user-{{ $user->id }}"
											class="btn btn-danger">Löschen</button>
										<a href="{{ url('/editUser',$user->id) }}">
											<button type="button" class="btn btn-success">Bearbeten</button>
										</a>
									</form>

								</td>
							</tr>
							@endforeach
						</tbody>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td><a href="{{ url('/addUser') }}">
									<button type="button" class="btn btn-success">Benutzer erstellen</button>
							</a></td>
						</tr>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
	</div>
</div>
@endsection @endrole
