@extends('layout.app')

@section('content')
<div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');"
  data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-start">
      <div class="col-md-12 ftco-animate text-center mb-5">
        <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i
                class="ion-ios-arrow-forward"></i></a></span> <span>About</span></p>
        <h1 class="mb-3 bread">Browse Jobs</h1>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section bg-light">
  <div class="container">
    @include('flash-message')
    <div class="row">
      <div class="col-lg-9 pr-lg-4">
        <div class="row">
          <ul id="myUL" class='col-lg-12' style="list-style-type: none;">
            {{-- @if(count($jobs) > 0)
		                    @foreach ($jobs as $job)
		                    <div class="card mb-3">
		                        <h5 class="h5 card-header"><a href="jobs/{{$job->id}}" class="text-info">{{$job->title}}</a>
            </h5>
            <div class="card-block px-3">
              <p class="small">
                <span>Budget: &#36;{{$job->budget}}</span>
                <span> - </span>
                <span>Posted: {{$job->created_at->diffForHumans()}}</span>
              </p>
              <p class="small">
                <span><span class="text-success"><i class="fas fa-briefcase"></i> Position Type:</span>
                  {{ ucwords($job->position_type) }}</span>
                <br>
                <span><span class="text-success"><i class="fas fa-hourglass-end"></i> Project Duration:</span>
                  {{ ucwords($job->project_duration) }}</span>
                <br>
                <span><span class="text-success"><i class="fas fa-tags"></i> Category:</span>
                  {{ ucwords($job->category->category_name) }}</span>
              </p>
            </div>
        </div>
        @endforeach
        {{ $jobs->links() }}
        @else
        <h2 class="h2 text-muted text-center">NO RESULT FOUND</h2>
        @endif --}}
        <div class="col-md-12 ftco-animate">
          @if(count($jobs) > 0 )
            @foreach ($jobs as $job)
            @if($job->isAvailable == 1)
            <li>
              <div class="job-post-item p-4 d-block d-lg-flex align-items-center">
                <div class="one-third mb-4 mb-md-0">
                  <div class="job-post-item-header align-items-center">
                    <span class="subadge">{{$job->position_type}}</span>
                    <h2 class="mr-3 text-black"><a href="jobsclient/{{$job->id}}">{{ $job->title }}</a></h2>
                  </div>
                  <div class="job-post-item-body d-block d-md-flex">
                    <div class="mr-3"><span class="icon-layers"></span> <a
                        href="/profile/jobclientprofile/{{$job->user->id}}">{{ $job->user->name }} </a></div>
                    {{-- <div><span class="icon-my_location"></span> <span>Western City, UK</span></div> --}}
                  </div>
                </div>
                {{-- <div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">
                          <div>
                            <a href="#" class="icon text-center d-flex justify-content-center align-items-center icon mr-2">
                                <span class="icon-heart"></span>
                            </a>
                        </div>
                        <a href="job-single.html" class="btn btn-primary py-2">Apply Job</a>
                      </div> --}}
                </div>
              @endif
              @endforeach
              {{ $jobs->links() }}
             
            @else
            <h2 class="h2 text-muted text-center">NO RESULT FOUND</h2>
            @endif
        </div>
        </li>

        {{-- <li>
                          <div class="col-md-12 ftco-animate">
                  <div class="job-post-item p-4 d-block d-lg-flex align-items-center">
                    <div class="one-third mb-4 mb-md-0">
                      <div class="job-post-item-header align-items-center">
                          <span class="subadge">Partime</span>
                        <h2 class="mr-3 text-black"><a href="#">Frontend Development</a></h2>
                      </div>
                      <div class="job-post-item-body d-block d-md-flex">
                        <div class="mr-3"><span class="icon-layers"></span> <a href="#">Facebook, Inc.</a></div>
                        <div><span class="icon-my_location"></span> <span>Western City, UK</span></div>
                      </div>
                    </div>

                    <div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">
                        <div>
                          <a href="#" class="icon text-center d-flex justify-content-center align-items-center icon mr-2">
                              <span class="icon-heart"></span>
                          </a>
                      </div>
                      <a href="job-single.html" class="btn btn-primary py-2">Apply Job</a>
                    </div>
                  </div>
                </div><!-- end --> --}}
        {{-- </li>
                            <li>
                          <div class="col-md-12 ftco-animate">
                  <div class="job-post-item p-4 d-block d-lg-flex align-items-center">
                    <div class="one-third mb-4 mb-md-0">
                      <div class="job-post-item-header align-items-center">
                                          <span class="subadge">Fulltime</span>
                        <h2 class="mr-3 text-black"><a href="#">Full Stack Developer</a></h2>
                      </div>
                      <div class="job-post-item-body d-block d-md-flex">
                        <div class="mr-3"><span class="icon-layers"></span> <a href="#">Google, Inc.</a></div>
                        <div><span class="icon-my_location"></span> <span>Western City, UK</span></div>
                      </div>
                    </div>

                    <div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">
                        <div>
                          <a href="#" class="icon text-center d-flex justify-content-center align-items-center icon mr-2">
                              <span class="icon-heart"></span>
                          </a>
                      </div>
                      <a href="job-single.html" class="btn btn-primary py-2">Apply Job</a>
                    </div>
                  </div>
                </div><!-- end -->
            </li>
            <li>
                <div class="col-md-12 ftco-animate">
                  <div class="job-post-item p-4 d-block d-lg-flex align-items-center">
                    <div class="one-third mb-4 mb-md-0">
                      <div class="job-post-item-header align-items-center">
                          <span class="subadge">Freelance</span>
                        <h2 class="mr-3 text-black"><a href="#">Open Source Interactive Developer</a></h2>
                      </div>
                      <div class="job-post-item-body d-block d-md-flex">
                        <div class="mr-3"><span class="icon-layers"></span> <a href="#">New York Times</a></div>
                        <div><span class="icon-my_location"></span> <span>Western City, UK</span></div>
                      </div>
                    </div>

                    <div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">
                        <div>
                          <a href="#" class="icon text-center d-flex justify-content-center align-items-center icon mr-2">
                              <span class="icon-heart"></span>
                          </a>
                      </div>
                      <a href="job-single.html" class="btn btn-primary py-2">Apply Job</a>
                    </div>
                  </div>
                </div><!-- end -->
            </li>
            <li>
                <div class="col-md-12 ftco-animate">
                  <div class="job-post-item p-4 d-block d-lg-flex align-items-center">
                    <div class="one-third mb-4 mb-md-0">
                      <div class="job-post-item-header align-items-center">
                          <span class="subadge">Partime</span>
                        <h2 class="mr-3 text-black"><a href="#">Frontend Development</a></h2>
                      </div>
                      <div class="job-post-item-body d-block d-md-flex">
                        <div class="mr-3"><span class="icon-layers"></span> <a href="#">Facebook, Inc.</a></div>
                        <div><span class="icon-my_location"></span> <span>Western City, UK</span></div>
                      </div>
                    </div>

                    <div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">
                        <div>
                          <a href="#" class="icon text-center d-flex justify-content-center align-items-center icon mr-2">
                              <span class="icon-heart"></span>
                          </a>
                      </div>
                      <a href="job-single.html" class="btn btn-primary py-2">Apply Job</a>
                    </div>
                  </div>
                </div><!-- end -->
            </li>
            <li>
                <div class="col-md-12 ftco-animate">
                  <div class="job-post-item p-4 d-block d-lg-flex align-items-center">
                    <div class="one-third mb-4 mb-md-0">
                      <div class="job-post-item-header align-items-center">
                          <span class="subadge">Temporary</span>
                        <h2 class="mr-3 text-black"><a href="#">Open Source Interactive Developer</a></h2>
                      </div>
                      <div class="job-post-item-body d-block d-md-flex">
                        <div class="mr-3"><span class="icon-layers"></span> <a href="#">New York Times</a></div>
                        <div><span class="icon-my_location"></span> <span>Western City, UK</span></div>
                      </div>
                    </div>

                    <div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">
                        <div>
                          <a href="#" class="icon text-center d-flex justify-content-center align-items-center icon mr-2">
                              <span class="icon-heart"></span>
                          </a>
                      </div>
                      <a href="job-single.html" class="btn btn-primary py-2">Apply Job</a>
                    </div>
                  </div>
                </div><!-- end -->
            </li>
            <li>
                   <div class="col-md-12 ftco-animate">
                  <div class="job-post-item p-4 d-block d-lg-flex align-items-center">
                    <div class="one-third mb-4 mb-md-0">
                      <div class="job-post-item-header align-items-center">
                          <span class="subadge">Fulltime</span>
                        <h2 class="mr-3 text-black"><a href="#">Full Stack Developer</a></h2>
                      </div>
                      <div class="job-post-item-body d-block d-md-flex">
                        <div class="mr-3"><span class="icon-layers"></span> <a href="#">Google, Inc.</a></div>
                        <div><span class="icon-my_location"></span> <span>Western City, UK</span></div>
                      </div>
                    </div>

                    <div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">
                        <div>
                          <a href="#" class="icon text-center d-flex justify-content-center align-items-center icon mr-2">
                              <span class="icon-heart"></span>
                          </a>
                      </div>
                      <a href="job-single.html" class="btn btn-primary py-2">Apply Job</a>
                    </div>
                  </div>
                </div><!-- end -->
            </li>
            <li>
                <div class="col-md-12 ftco-animate">
                  <div class="job-post-item p-4 d-block d-lg-flex align-items-center">
                    <div class="one-third mb-4 mb-md-0">
                      <div class="job-post-item-header align-items-center">
                          <span class="subadge">Freelance</span>
                        <h2 class="mr-3 text-black"><a href="#">Open Source Interactive Developer</a></h2>
                      </div>
                      <div class="job-post-item-body d-block d-md-flex">
                        <div class="mr-3"><span class="icon-layers"></span> <a href="#">New York Times</a></div>
                        <div><span class="icon-my_location"></span> <span>Western City, UK</span></div>
                      </div>
                    </div>

                    <div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">
                        <div>
                          <a href="#" class="icon text-center d-flex justify-content-center align-items-center icon mr-2">
                              <span class="icon-heart"></span>
                          </a>
                      </div>
                      <a href="job-single.html" class="btn btn-primary py-2">Apply Job</a>
                    </div>
                  </div>
                </div><!-- end -->
            </li>
            <li>
                <div class="col-md-12 ftco-animate">
                  <div class="job-post-item p-4 d-block d-lg-flex align-items-center">
                    <div class="one-third mb-4 mb-md-0">
                      <div class="job-post-item-header align-items-center">
                          <span class="subadge">Internship</span>
                        <h2 class="mr-3 text-black"><a href="#">Frontend Development</a></h2>
                      </div>
                      <div class="job-post-item-body d-block d-md-flex">
                        <div class="mr-3"><span class="icon-layers"></span> <a href="#">Facebook, Inc.</a></div>
                        <div><span class="icon-my_location"></span> <span>Western City, UK</span></div>
                      </div>
                    </div>

                    <div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">
                        <div>
                          <a href="#" class="icon text-center d-flex justify-content-center align-items-center icon mr-2">
                              <span class="icon-heart"></span>
                          </a>
                      </div>
                      <a href="job-single.html" class="btn btn-primary py-2">Apply Job</a>
                    </div>
                  </div>
                </div><!-- end --> --}}
        {{-- </li> --}}
        {{-- <li>
                <div class="col-md-12 ftco-animate">
                  <div class="job-post-item p-4 d-block d-lg-flex align-items-center">
                    <div class="one-third mb-4 mb-md-0">
                      <div class="job-post-item-header align-items-center">
                          <span class="subadge">Temporary</span>
                        <h2 class="mr-3 text-black"><a href="#">Open Source Interactive Developer</a></h2>
                      </div>
                      <div class="job-post-item-body d-block d-md-flex">
                        <div class="mr-3"><span class="icon-layers"></span> <a href="#">New York Times</a></div>
                        <div><span class="icon-my_location"></span> <span>Western City, UK</span></div>
                      </div>
                    </div>

                    <div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">
                        <div>
                          <a href="#" class="icon text-center d-flex justify-content-center align-items-center icon mr-2">
                              <span class="icon-heart"></span>
                          </a>
                      </div>
                      <a href="job-single.html" class="btn btn-primary py-2">Apply Job</a>
                    </div>
                  </div>
                </div><!-- end -->
            </li> --}}
        </ul>
      </div>
      {{-- <div class="row mt-5">
                <div class="col text-center">
                  <div class="block-27">
                    <ul>
                      <li><a href="#">&lt;</a></li>
                      <li class="active"><span>1</span></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#">5</a></li>
                      <li><a href="#">&gt;</a></li>
                    </ul>
                  </div>
                </div>
              </div> --}}
    </div>
    <div class="col-lg-3 float-right">
      <div class="sidebar-box bg-white p-4 ftco-animate">
        <h3 class="heading-sidebar">Browse Category</h3>
        <form method="get" class="search-form mb-3">
          <div class="form-group">
            <span class="icon icon-search"></span>
            <input type="text" name="search" class="form-control mt-2" placeholder="Search Job">
          </div>
          <div class="form-check">
            <input class="form-check-input catFilter" type="checkbox" value="all" id="filterall" name="cat" @if($cat> 0)
            {{'unchecked'}}
            @else
            {{'checked'}}
            @endif
            >
            <label class="form-check-label" for="filterall">All</label>
          </div>
          @foreach($categories as $category)
          <div class="form-check">
            <input class="form-check-input catFilter" type="checkbox" value="{{$category->id}}"
              id="defaultCheck1{{$category->id}}" name="cat" @if($cat==$category->id)
            {{'checked'}}
            @endif
            >
            <label class="form-check-label" for="defaultCheck1{{$category->id}}">
              {{$category->category_name}}
            </label>
          </div>
          @endforeach
          {{-- <label for="option-job-1"><input type="checkbox" id="option-job-1" name="vehicle" value="" checked> Website &amp; Software</label><br>
                            <label for="option-job-2"><input type="checkbox" id="option-job-2" name="vehicle" value=""> Education &amp; Training</label><br>
                            <label for="option-job-3"><input type="checkbox" id="option-job-3" name="vehicle" value=""> Graphics Design</label><br>
                            <label for="option-job-4"><input type="checkbox" id="option-job-4" name="vehicle" value=""> Accounting &amp; Finance</label><br>
                            <label for="option-job-5"><input type="checkbox" id="option-job-5" name="vehicle" value=""> Restaurant &amp; Food</label><br>
                            <label for="option-job-6"><input type="checkbox" id="option-job-6" name="vehicle" value=""> Health &amp; Hospital</label><br> --}}

          <button class="btn btn-primary mt-2" id="searchCat">Search</button>
        </form>
      </div>

    </div>
  </div>
  </div>
</section>


<section class="ftco-section-parallax">
  <div class="parallax-img d-flex align-items-center">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
          <h2>Subcribe to our Newsletter</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the
            blind texts. Separated they live in</p>
          <div class="row d-flex justify-content-center mt-4 mb-4">
            <div class="col-md-12">
              <form action="#" class="subscribe-form">
                <div class="form-group d-flex">
                  <input type="text" class="form-control" placeholder="Enter email address">
                  <input type="submit" value="Subscribe" class="submit px-3">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  function myFunction() {
          // Declare variables
          var input, filter, ul, li, a, i, txtValue;
          input = document.getElementById('search');
          filter = input.value.toUpperCase();
          ul = document.getElementById("myUL");
          li = ul.getElementsByTagName('li');
        
          // Loop through all list items, and hide those who don't match the search query
          for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
              li[i].style.display = "";
            } else {
              li[i].style.display = "none";
            }
          }
        }

        
      $(document).ready(function(){
          $('input:checkbox').click(function() {
              $('input:checkbox').not(this).prop('checked', false);
          });
      });

</script>
@endsection