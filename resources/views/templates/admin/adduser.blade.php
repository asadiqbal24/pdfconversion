@extends('templates.partials.default')
@section('content')
<div class="content">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
							<div class="card-header header-elements-inline">
				                <h6 class="card-title">Add User</h6>
								<div class="header-elements">
									<div class="list-icons">
				                		<a class="list-icons-item" data-action="collapse"></a>
				                		<a class="list-icons-item" data-action="reload"></a>
				                		<a class="list-icons-item" data-action="remove"></a>
				                	</div>
			                	</div>
							</div>

			                <div class="card-body">
			                	<form method="post" action="{{route('post-user')}}" enctype="multipart/form-data">
			                		@csrf
									<div class="form-group">
										<label>Your name: </label>
										<input type="text" name="name" class="form-control" placeholder="Name">
									</div>

									<div class="form-group">
										<label>Your Email: </label>
										<input type="text" name="email" class="form-control" placeholder="Your strong password">
									</div>

									<div class="form-group">
										<label>Your Phone: </label>
										<input type="text" name="phone" class="form-control" placeholder="123456">
									</div>

									<div class="form-group">
										<label> Date Of Birth: </label>
										<input type="Date" name="dob" class="form-control" >
									</div>

									<div class="form-group">
										<label>Your Images: </label>
										<input type="file" name="images" class="form-control" >
									</div>

									<div class="text-right">
										<button type="submit" class="btn bg-teal-400">Submit form <i class="icon-paperplane ml-2"></i></button>
									</div>
								</form>
							</div>
		                </div>
			
		</div>
		
	</div>


</div>
 @endsection()
@section('jsOutside')
@endsection()