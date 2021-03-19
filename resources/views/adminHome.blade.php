@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    You are Admin.

                    <div class="row">
                        <div class="col-lg-12">
           <a href="{{route('document.wordtopdf')}}" class="btn btn-dark">Convert Word To PDF</a>

                        </div>
                        
                    </div>
                    <div style="margin-top: 5%;">
                        
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
           <a href="{{route('document.exceltopdf')}}" class="btn btn-dark">Convert Excel To PDF</a>

                        </div>
                        
                    </div>
                      
                    <div class="row" style="margin-top: 5%;">
                        <div class="col-lg-12">
           <a href="{{route('document.convertJPGToPDF')}}" class="btn btn-dark">Convert JPG To PDF</a>

                        </div>
                        
                    </div>

 <div class="row" style="margin-top: 5%;">
                        <div class="col-lg-12">
           <a href="{{route('document.convertPDFToWord')}}" class="btn btn-dark">Convert PDF To Word</a>

                        </div>
                        
                    </div>


                     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection