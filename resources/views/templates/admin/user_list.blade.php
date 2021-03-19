@extends('templates.partials.default')
@section('content')
<div class="content">
	<div class="row">
		<div class="col-lg-12">
			<a href="{{route('add-user')}}" class="btn btn-success" style="margin-bottom: 1%;">Add User</a>
			 
		</div>
		
	</div>
	

<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">User List</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

					<!-- <div class="card-body" style="">
						Example of a table with default styling. By default any table with <code>.table</code> class has <code>transparent</code> background color and grey border color. Table header and table footer have the same styling: transparent background, semibold font weight, darker horizontal border and the same height as table body cells.
					</div> -->

					<div class="table-responsive" style="">
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Email</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@php $i=1
								@endphp
								@foreach($user as $u)
								<tr>
									<td>{{$i++}}</td>
									<td>{{$u->name}}</td>
									<td>{{$u->email}}</td>
									<td><a href="{{route('user-edit',['id'=>$u->id])}}" class="btn btn-success">Edit</a></td>
										<td><a href="{{route('user-delete',['id'=>$u->id])}}" class="btn btn-danger">Delete</a></td>
									
								</tr>
                                @endforeach
																
								
								
							</tbody>
							<!-- <tfoot>
								<tr>
									<th>#</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Username</th>
								</tr>
							</tfoot> -->
						</table>
					</div>
				</div>
</div>
@endsection()
@section('jsOutside')
@endsection()