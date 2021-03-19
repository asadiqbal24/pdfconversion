<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Laravel</title>
		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<!-- Styles -->
		
	</head>
	<body>
		<div class="row">
			<div class="col-lg-12">
				<h2 class="main-subheader" style="text-align: center;">Easily convert to and from PDF in seconds.</h2>
				
			</div>
			
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-8" style="margin-left: 16%;">
					<div class="card bg-warning">
						<div class="card-header">
							<h2 style="text-align: center;">Online Word To PDF Converter</h2>
						</div>
						<form method="post" action="{{route('document.convert.wordtopdf')}}" enctype="multipart/form-data">
							@csrf
						<div class="card-body">
							<div class="row" style="text-align: center;">
								<div class="col-lg-12" style="margin-top: 1%;">
									<label>Upload Word File</label>
									<div>
										<input type="file" class="form-control" name="file_upload" style="display: unset;" required>
									</div>
									<div style="margin-top: 2%;">
										<label>Select Conversion</label>
									</div>
									<div>
										<select class="form-control">
											<option value="{{NULL}}">Choose</option>
											<option value="WORD To PDF">WORD To PDF</option>
										</select>
										
									</div>
									
								</div>
								
								
							</div>
						</div>

						<div style="margin-top: 1%;"> 
                                 <button type="submit" class="btn btn-primary">Word To Pdf</button>										
									</div>


									</form>
					</div>
				</div>
				
			</div>
			
		</div>



		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-8" style="margin-left: 16%;">
					<div class="card bg-warning">
						<div class="card-header">
							<h2 style="text-align: center;">Online Excel To PDF Converter</h2>
						</div>
						<form method="post" action="{{route('document.exceltopdf')}}" enctype="multipart/form-data">
							@csrf
						<div class="card-body">
							<div class="row" style="text-align: center;">
								<div class="col-lg-12" style="margin-top: 1%;">
									<label>Upload Excel File</label>
									<div>
										<input type="file" class="form-control" name="file_upload2" style="display: unset;" required>
									</div>
									<div style="margin-top: 2%;">
										<label>Select Conversion</label>
									</div>
									<div>
										<select class="form-control">
											<option value="{{NULL}}">Choose</option>
								
											<option value="EXCEL To PDF">EXCEL To PDF</option>
								
										</select>
										
									</div>
									
								</div>
								
								
							</div>
						</div>

						<div style="margin-top: 1%;"> 
                                 <button type="submit" class="btn btn-primary">Excel To Pdf</button>										
									</div>


									</form>
					</div>
				</div>
				
			</div>
			
		</div>





		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-8" style="margin-left: 16%;">
					<div class="card bg-warning">
						<div class="card-header">
							<h2 style="text-align: center;">Online IMAGE To PDF Converter</h2>
						</div>
						<form method="post" action="{{route('document.convertJPGToPDF')}}" enctype="multipart/form-data">
							@csrf
						<div class="card-body">
							<div class="row" style="text-align: center;">
								<div class="col-lg-12" style="margin-top: 1%;">
									<label>Upload IMAGE File</label>
									<div>
										<input type="file" class="form-control" name="image_pdf" style="display: unset;" required>
									</div>
									<div style="margin-top: 2%;">
										<label>Select Conversion</label>
									</div>
									<div>
										<select class="form-control">
											<option value="{{NULL}}">Choose</option>
										
											<option value="JPG To PDF">Image To PDF</option>
										</select>
										
									</div>
									
								</div>
								
								
							</div>
						</div>

						<div style="margin-top: 1%;"> 
                                 <button type="submit" class="btn btn-primary">Image To Pdf</button>										
									</div>


									</form>
					</div>
				</div>
				
			</div>
			
		</div>



		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-8" style="margin-left: 16%;">
					<div class="card bg-warning">
						<div class="card-header">
							<h2 style="text-align: center;">Online PDF TO PDF MERGE</h2>
						</div>
						<form method="post" action="{{route('merge-pdf-to-pdf')}}" enctype="multipart/form-data">
							@csrf
						<div class="card-body">
							<div class="row" style="text-align: center;">
								<div class="col-lg-12" style="margin-top: 1%;">
									<label>Upload PDF File</label>
									<div>
										<input type="file" class="form-control" name="pdf" style="display: unset;" required>
									</div>
									<div style="margin-top: 2%;">
										<label>Upload PDF File </label>
									</div>
									<div>
										<input type="file" class="form-control" name="pdf1" style="display: unset;" required>
										
									</div>
									
								</div>
								
								
							</div>
						</div>

						<div style="margin-top: 1%;"> 
                                 <button type="submit" class="btn btn-primary">Merge PDF To PDF</button>										
									</div>


									</form>
					</div>
				</div>
				
			</div>
			
		</div>



		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-8" style="margin-left: 16%;">
					<div class="card bg-warning">
						<div class="card-header">
							<h2 style="text-align: center;">Online PDF SPLIT Converter</h2>
						</div>
						<form method="post" action="{{route('split-pdf')}}" enctype="multipart/form-data">
							@csrf
						<div class="card-body">
							<div class="row" style="text-align: center;">
								<div class="col-lg-12" style="margin-top: 1%;">
									<label>Upload File</label>
									<div>
<input type="file" class="form-control" name="split-pdf" style="display: unset;" required>
									</div>
									
									
									
								</div>
								
								
							</div>
						</div>

						<div style="margin-top: 1%;"> 
                                 <button type="submit" class="btn btn-primary">Split PDF</button>										
									</div>


									</form>
					</div>
				</div>
				
			</div>
			
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-8" style="margin-left: 16%;">
					<div class="card bg-warning">
						<div class="card-header">
							<h2 style="text-align: center;">Online PPT TO PDF Converter</h2>
						</div>
						<form method="post" action="{{route('ppt-to-pdf')}}" enctype="multipart/form-data">
							@csrf
						<div class="card-body">
							<div class="row" style="text-align: center;">
								<div class="col-lg-12" style="margin-top: 1%;">
									<label>Upload File</label>
									<div>
							<input type="file" class="form-control" name="ppt-pdf" style="display: unset;" required>
									</div>
									<div>
										<label>Select Conversion</label>
									</div>
									<div>
										<select class="form-control">
											<option value="{{NULL}}}">Choose</option>
											<option value="PPt TO PDF">PPT TO PDF</option>
										</select>
									</div>
									
									
									
								</div>
								
								
							</div>
						</div>

						<div style="margin-top: 1%;"> 
                                 <button type="submit" class="btn btn-primary">PPT TO PDF</button>										
									</div>


									</form>
					</div>
				</div>
				
			</div>
			
		</div>
		
	</body>
</html>