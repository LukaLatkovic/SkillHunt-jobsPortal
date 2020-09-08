@extends('layout.app')

@section('content')
<div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-start">
        <div class="col-md-12 ftco-animate text-center mb-5">
            {{-- <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p> --}}
          <h1 class="mb-3 bread">Job Post</h1>
        </div>
      </div>
    </div>
  </div>

<section class="ftco-section bg-light">
   <div class="container ftco-animate">
    <div class="row justify-content-center">
        <div class="col-md-10 my-5">  
			@include('flash-message')
            <div class="card card-default">  
                <div class="card-header"><h3 class="h3 text-center ">Create a Job Post</h3></div>
                <div class="card-body">
                  <form method="POST" action="/jobsclient">
                  	{{ csrf_field() }}
                  	 <div class="form-group">
					    <label for="title">Title of Job Posting</label>
					    <input type="text" class="form-control" id="title" name="title" placeholder="Example: Web Developer with Ecommerce Experience">
					  </div>
					  <div class="form-group">
					    <label for="article-ckeditor">Job Description</label>
						<textarea class="form-control" id="article-ckeditor" rows="3" name="body"></textarea>
						<script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
                        <script>
                            CKEDITOR.replace( 'article-ckeditor' );
                        </script>
					  </div>
					  <div class="row">
						  <div class="form-group col-md-6">
						    <label for="budget">Propose Budget</label>
						    <input type="number" class="form-control" id="budget" name="budget">
						  </div>
						  <div class="form-group col-md-6">
						    <label for="jobcategory">Job Category</label>
						    <select class="form-control" id="jobcategory" name="category_id">
						    	<option selected disabled value="0">...Select Job Category</option>
			                        @foreach ($categories as $category)
			                            <option value="{{$category->id}}">{{$category->category_name}}</option>
			                        @endforeach
						    </select>
						    </div>
					  </div>
					  <div class="row">
						  <div class="form-group col-md-6">
						    <label for="positionType">Position Type</label>
						    <select class="form-control" id="positionType" name="positionType" id="positionType">
						    	<option selected disabled value="0">...Select Job Category</option>
			                    <option value="part-time">Part-Time</option>
			                   	<option value="full-time">Full-Time</option>
						    </select>
						  </div>
						  <div class="form-group col-md-6">
						    <label for="project_duration">Project Duration</label>
						    <select class="form-control" id="project_duration" name="project_duration" id="project_duration">
						    	<option selected disabled value="0">...Select Project Duration</option>
			                    <option value="Less than 1 week">Less than 1 week</option>
			                   	<option value="Less than 1 month">Less than a month</option>
			                   	<option value="1 - 3 months">1 - 3 months</option>
			                   	<option value="3 - 6 months">3 - 6 months</option>
                                <option value="More than 6 months">More than 6 months</option>
                                <option value="Undefined">Undefined</option>
						    </select>
						  </div>
					  </div>
					  <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- @section('jsplugins') 
  <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
  <script>
      CKEDITOR.replace( 'article-ckeditor' );
  </script>
@endsection --}}