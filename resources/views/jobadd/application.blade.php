@extends('layout.app')


@section('content')
<div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
            <div class="col-md-12 ftco-animate text-center mb-5">
                <h1 class="mb-3 bread">Job Application</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 my-5">
                @include('flash-message')
                <div class="card card-default">
                    <div class="card-header">
                        <h4 class="h4 text-muted">JOB DETAILS</h4>
                    </div>
                    <div class="card-body pt-0 table-responsive py-3">
                        <div class="row">
                            <div class="col-sm-8">
                                <h5 class="h5">{{ $job->title }}</h5>
                                <p>Job description:</p>
                                <article>{!! $job->body !!}</article>
                            </div>
                            <div class="col-sm-4 job-pecification">
                                <ul class="list-unstyled">
                                    <li class="mb-2">
                                        <span class="text-success">
                                            <i class="fas fa-euro-sign"></i> Budget :
                                        </span>
                                        {{number_format($job->budget)}} &euro;
                                    </li>
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
                                            <i class="fas fa-tags"></i> Category:
                                        </span>
                                        {{ ucwords($job->category->category_name) }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-default mt-5">
                    <form action="{{url("/job/application/$job->id/store")}}" method="POST">
                        {{ csrf_field() }}
                        <div class="card-header">
                            <h4 class="h4 text-muted">APPLICATION LETTER</h4>
                        </div>
                        <div class="card-body pt-0 table-responsive py-3">
                            <div class="form-group">
                                <label for="exampleTextarea">Tell something about yourself</label>
                                <textarea name="application_letter" class="form-control" id="exampleTextarea"
                                    rows="8"></textarea>
                                    <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
                                        <script>
                                            CKEDITOR.replace( 'exampleTextarea' );
                                        </script>
                                   
                            </div>
                        </div>
                        <input type="hidden" value="{{$job->id}}" name="job">
                        <div class="card-header">
                            <button type="submit" class="btn btn-primary btn-lg px-5">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('jsplugins')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Readmore.js/2.2.0/readmore.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
			$('article').readmore({
			  afterToggle: function(trigger, element, expanded) {
			    if(! expanded) { // The "Close" link was clicked
			      $('html, body').animate( { scrollTop: element.offset().top }, {duration: 100 } );			  
			    } 
			  }
			});
		});
    </script>
    @endsection