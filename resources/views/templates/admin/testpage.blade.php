@extends('templates.partials.default')
@section('content')
<div class="content">
	

<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Test Page</h5>
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

					<div class="row">
						<div class="col-lg-12">
							<a href="{{url('document.convertPDFToWord')}}" class="btn btn-danger">PDF To Word</a>
							
						</div>
						
					</div>


					 <img src="{{ public_path('pic2.jpg') }}" style="width: 200px; height: 200px">

						<div class="row">
						<div class="col-lg-12">
							<a href="{{route('image-to-pdf')}}" class="btn btn-danger"> imageToPDF</a>
							
						</div>
						
					</div>


					
				</div>
</div>
@endsection()
@section('jsOutside')
@endsection()