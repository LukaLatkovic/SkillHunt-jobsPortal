@extends('layout.app')

@section('content')
<div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-start">
        <div class="col-md-12 ftco-animate text-center mb-5">
            {{-- <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p> --}}
          <h1 class="mb-3 bread">Current open jobs</h1>
        </div>
      </div>
    </div>
  </div>

<section class="ftco-section bg-light">
   <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 my-5">
            @include('includes.alert')
            <div class="card card-default text-white">

                <div class="card-body text-muted">
                    @if(count($jobs) > 0)
                       <div class="table-responsive">
                            <table class="table">                              
                              <tbody>
                               @foreach($jobs as $job)
                                    <tr>
                                      <td>
                                        <h5 class="h5">
                                            <a href="/shortlist/{{$job->id}}" class="text-info">{{$job->title}}</a>
                                        </h5>
                                        <p class="small">Posted: {{$job->created_at->diffForHumans()}}</p>
                                      </td>
                                    </tr>
                                @endforeach
                              </tbody>
                            </table>
                        {{ $jobs->links() }}
                     </div>
                      </div>
                    @else
                        <p class="my-5 text-center">You currently have no open job postings</p>
                    @endif
                     
            </div>
        </div>
    </div>
</div>
</section>
@endsection