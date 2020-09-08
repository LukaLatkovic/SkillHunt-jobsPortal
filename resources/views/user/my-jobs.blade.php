@extends('layout.app')

@section('content')
<div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-start">
        <div class="col-md-12 ftco-animate text-center mb-5">
          <h1 class="mb-3 bread">Applied Jobs</h1>
            {{-- <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p> --}}
          <h1 class="mb-3 bread"></h1>
        </div>
      </div>
    </div>
  </div>

<section class="ftco-section bg-light">
<div class="container">
    <div class="row justify-content-center">
       <div class="col-md-10 my-5">
            <div class="card card-default">  
                <div class="card-header">
                	<h4 class="h4 text-muted">MY JOBS</h4>
                </div>
                <div class="card-body pt-0 table-responsive py-3">
                	<div class="row">
	                   <div class="col-xs-12 table-responsive">
	                   	<table class="table table-striped">
						  <thead>
						    <tr>
						      <th>Job</th>
						      <th>Status</th>
						      <th class="px-5"></th>
						    </tr>
						  </thead>
						  <tbody>						    
	                   	@foreach($jobs as $job)
	                   		<tr>
						      <td>
						      	<a href="/jobsclient/{{$job->job_id}}"><h4 class="h5">{{ $job->title }}</h4></a>
						      </td>
						      <td>
						      	@if ($job->status =='hired')
						      		<h4><span class="badge badge-success w-100">{{ $job->status }}</span></h4>
						      	@elseif($job->status =='rejected')
						      		<h4><span class="badge badge-danger w-100">{{ $job->status }}</span></h4>
						      	@else
						      		<h4><span class="badge badge-info w-100">{{ $job->status }}</span></h4>
						      	@endif
						      </td>
						      <td>
						      	@if ($job->status !='hired')
						      	
						      	@else	
						      		<a href="#" data-toggle="tooltip" data-placement="top" title="Send Message">
						      			<p class="text-primary text-center">
						      				<i class="far fa-envelope fa-2x"></i>
							      		</p>
							      	</a>
						      	@endif
						      </td>
						    </tr>
	                   		
	                   	@endforeach

						  </tbody>
						</table>
	                   </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jsplugins')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script>
	$(document).ready(function(){
	        $('[data-toggle="tooltip"]').tooltip(); 
	    });
</script>
@endsection