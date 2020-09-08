@extends('layout.app')

@section('content')
<div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');"
  data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-start">
      <div class="col-md-12 ftco-animate text-center mb-5">
        <h1 class="mb-3 bread">Client Dashboard</h1>
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
        @include('flash-message')
        <div class="card card-default ftco-animate">
          <div class="card-header">
            <h3 class="h3 d-inline-block">Client Dashboard</h3>
            <span class="float-right">
              @if(Auth::user()->role == 2)
              <a href="/jobsclient/create"><button class="btn btn-primary">Post a Job</button></a>
              @endif
            </span>
          </div>
          <div class="card-body pt-0 table-responsive">
            @if(count($jobs) > 0)
            <table class="table table-striped" id="jobTable">
              <thead>
                <tr>
                  <th>Job</th>
                  <th>Date Posted</th>
                  <th>Posted By</th>
                  <th class="justify-content-center" style="text-align:center">Candidates</th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($jobs as $job)
                <tr>
                  <th scope="row">
                    <h5 class="h5"><a href="jobsclient/{{$job->id}}" class="text-success">{{$job->title}}</a></h5>
                  </th>
                  <td><small>{{$job->created_at->diffForHumans()}}</small></td>
                  <td>{{$job->user->name}}</td>
                  <td style="text-align:center" class="justify-content-center">
                    <a href="/shortlist/{{$job->id}}"><i class="fas fa-list text-success" id="list"
                        data-id="{{$job->id}}"></i></a>
                  </td>
                  <td>
                    @if($job->isAvailable == 1)
                    <form method="POST" action="/dashboard/inactivate">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{$job->id}}" name="id">
                    <button type="submit" class="btn btn-success">Active</button>
                    </form>
                    @else
                    <form method="POST" action="/dashboard/activate">
                      {{ csrf_field() }}
                      <input type="hidden" value="{{$job->id}}" name="id">
                    <button type="submit" class="btn btn-secondary" style="background-color: #6c757d !important; border: #6c757d !important;" ><a href="/dashboard/inactivate/{{$job->id}}"></a>Inactive</button>
                    </form>
                    @endif
                  </td>
                  <td>
                    <a href="jobsclient/{{$job->id}}/edit"><i class="far fa-edit text-info" id="editJob"
                        data-id="{{$job->id}}"></i></a>
                  </td>
                  <td>
                    <i class="far fa-trash-alt text-danger" id="deleteJob" data-id="{{$job->id}}">
                  </td>
                </tr>
                @endforeach
                @else
                <p class="mt-5 text-center mb-5">You don't have any job post</p>
                @endif
              </tbody>
            </table>
            {{$jobs->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
  $(document).ready(function() {
    $('#jobTable').focus();
  });
</script>   
</section>
@endsection