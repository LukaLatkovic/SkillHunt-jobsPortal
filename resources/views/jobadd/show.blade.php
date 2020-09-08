@extends('layout.app')

@section('content')
<div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-start">
        <div class="col-md-12 ftco-animate text-center mb-5">
            {{-- <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p> --}}
          <h1 class="mb-3 bread">{{$job->title}}</h1>
        </div>
      </div>
    </div>
  </div>

<section class="ftco-section bg-light">
   <div class="container">
	@include('flash-message')
    <div class="row justify-content-center my-5">
        <div class="col-md-7">
           <h3 class="h3 text mb-4">Job description</h3>
           
           {!! $job->body !!}
           <br/>

           
        </div>
        <div class="col-md-3 ">
        	<ul class="list-unstyled">
        		<li class="mb-2">
        			<span class="text-success">
        				<i class="fas fa-clock"></i> Posted: 
        			</span>
        			{{$job->created_at->diffForHumans()}}
        		</li>
        		<li class="mb-2">
        			<span class="text-success">
        				<i class="fas fa-briefcase"></i> Position : 
        			</span>
        			{{ucwords($job->position_type)}}
        		</li>
        		<li class="mb-2">
        			<span class="text-success">
        				<i class="fas fa-hourglass-end"></i> Project Duration:  
        			</span>
        			{{ ucwords($job->project_duration) }}
				</li>
				<li class="mb-2">
        			<span class="text-success">
        				<i class="fas fa-money-bill-wave"></i> Salary:  
        			</span>
					{{number_format($job->budget)}}
					<i class="fas fa-euro-sign fa-sm"></i>
					@if($job->budget > 50000) a year @endif
        		</li>
        		<li class="mb-2">
        			<span class="text-success">
        				<i class="fas fa-tags"></i> Category: 
        			</span>
        			{{ ucwords($job->category->category_name) }}
        		</li>
        	</ul>
        	<hr>
        	<ul class="list-unstyled">
                <li class="mb-2 h5 text-info">About the Client</li>
                <li class="mb-2">
        			<span class="text-primary">Client Name: <a href="/profile/jobclientprofile/{{$job->user->id}}">{{$job->user->name}}</li></a>
        		<li class="mb-2">
        			<span class="text-primary">Job Posting History: </span>{{$jobcount}} jobs posted</li>
        		<li class="mb-2">
        			<span class="text-primary">Member Since: </span>{{date("M Y", strtotime($job->user->created_at))}}
        		</li>
        	</ul>
        	@guest
        	@else
	        	@if(Auth::user()->role == 1)
                    @if ($result == 'exist')
                       <button class="btn btn-success btn-block"><i class="fas fa-check"></i>Applied</button>
                    @else
	        		<a href="{{url("/job/application/$job->id")}}"><button class="btn btn-primary btn-block"> Apply to this Job</button></a>
                    @endif
	        	@endif
         	@endguest



        </div>
    </div>
</div>
@endsection
