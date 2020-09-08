@extends('layout.app')

@section('content')
<div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-start">
        <div class="col-md-12 ftco-animate text-center mb-5">
            {{-- <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p> --}}
          <h1 class="mb-3 bread"></h1>
        </div>
      </div>
    </div>
  </div>

<section class="ftco-section bg-light">
   <div class="container ftco-animate">
    <div class="row justify-content-center">
       <div class="col-md-10 my-5">
            <div class="card card-default">  
                <div class="card-header">
                	<h4 class="h4 text-info">PROPOSAL</h4>
                </div>
                <div class="card-body pt-0 table-responsive py-3">
                	<div class="row">
                		<div class="col-sm-8">                			
                			<div>{!! $applicant->application_letter!!}</div>
                		</div>
                		<div class="col-sm-4">
                			 <ul class="list-unstyled">
                                    <li class="mb-2 text-center">
                                      @if(!empty($applicant->photo))
                                      <img class="p-0 profilepicture rounded-circle" 
                                          src="{{asset('storage/images/'.$applicant->photo) }}">
                                      @else
                                      <i class="fas fa-user-circle fa-5x text-muted"></i>
                                      @endif
                                    </li>
                                    <li class="mb-2">
                                       <p class="h4 text-info text-center">{{ $applicant->name }}</p>
                                       <p class="h6">{{$applicant->job_title}}</p>
                                    </li>
                                    <li class="mb-2">
                                    	<i class="fas fa-map-marker-alt"></i> <span>{{$applicant->city}}, {{$applicant->province}} {{$applicant->country}}</span>
                                    </li>
                                    <li class="mb-2">
                                    	<i class="fas fa-envelope"></i> Received: {{$job->created_at->diffForHumans()}}
                                    </li>
                                    <li class="mb-2">
                                        <a href="/applicant/profile/{{$applicant->user_id}}" class="btn btn-info w-100">View Profile</a>
                                    </li>
                                     @if ($applicant->status == 'hired')
                                        <td class="text-center">
                                          <h4 class="text-center"><span class="badge badge-success w-100"><i class="fas fa-check"></i> <strong>HIRED</span></h4>
                                       </td>
                                     @elseif ($applicant->status == 'rejected')
                                          <td class="text-center">
                                          <h4 class="text-center"><span class="badge badge-danger w-100"><i class="fas fa-times"></i> <strong>REJECTED</span></h4>
                                       </td>
                                     @else
                                        <li>
                                            <a href="/proposal/{{$job->id}}/{{$applicant->id}}/hire" class="btn btn-success w-100 mb-2">HIRE</a>
                                        </li>
                                        <li>
                                            <a href="/proposal/{{$job->id}}/{{$applicant->id}}/reject" class="btn btn-danger w-100">REJECT</a>
                                        </li>
                                      @endif   
                                  
                                </ul>
                		</div>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection



