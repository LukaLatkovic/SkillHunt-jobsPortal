@include('includes.headapp')
@include('includes.navbarapp')
@section('content')
<div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-start">
        <div class="col-md-12 ftco-animate text-center mb-5">
          <h1 class="mb-3 bread">Profile - {{$user->name}} - Edit</h1>
        </div>
      </div>
    </div>
</div>
    <section class="ftco-section bg-light">
        <div class="container">

  
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('flash-message')
                <div class="tab-content" style="align:center">
                    <div class="card" style="padding:20px; padding-top: 30px;">
                        @if($profile == null)
                        <form method="POST" action="/profile/store">
                            @else
                            <form method="POST" action="/profile/edit">
                                @endif
                                @csrf
                                {{-- <input type="hidden" value="{{Auth::user()->id}}" name="user_id"> --}}
                                <div class="form-group">
                                    <label for="jobTitle" class="col-sm-4 col-form-label">
                                        @if($user->role == 2)
                                        Slogan
                                        @else
                                        Professional title  
                                        @endif
                                    </label>

                                    <div class="col-md-12">
                                        <input type="text" id="editJobTitle" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title"
                                            value="{{$profile !== null ? $profile->job_title : ''}}">

                                            @if ($errors->has('title'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                        @endif
                                        {{-- @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif --}}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="city" class="col-md-4 col-form-label ">City (optional)</label>

                                    <div class="col-md-12">
                                        <input type="text" id="editCity" class="form-control {{ $errors->has('city') ? ' is-invalid' : '' }}" name="city"
                                            value="{{$profile !== null ? $profile->city : ''}}">

                                            @if ($errors->has('city'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('city') }}</strong>
                                            </span>
                                        @endif
                                        {{-- @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif --}}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="province" class="col-md-4 col-form-label ">Province (optional)</label>

                                    <div class="col-md-12">
                                        <input type="text" id="editProvince" class="form-control {{ $errors->has('province') ? ' is-invalid' : '' }}" name="province"
                                            value="{{$profile !== null ? $profile->province : ''}}">

                                            @if ($errors->has('province'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('province') }}</strong>
                                            </span>
                                        @endif
                                        {{-- @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif --}}
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="country" class="col-md-2 col-form-label">Country</label>

                                    <div class="col-md-12">
                                        <input type="text" id="editCountry" class="form-control {{ $errors->has('country') ? ' is-invalid' : '' }}" name="country"
                                            value="{{$profile !== null ? $profile->country : ''}}">
                                            @if ($errors->has('country'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('country') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="overview" class="col-md-4 col-form-label ">
                                        @if($user->role == 2)
                                        Company overview
                                        @else
                                        Overview 
                                        @endif
                                        </label>

                                    <div class="col-md-12">
                                        <textarea class="form-control" id="summary-ckeditor" name="overview" rows="3">
                                        {{$profile !== null ? $profile->overview : ''}}</textarea>
                                        <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
                                        <script>
                                            CKEDITOR.replace( 'summary-ckeditor' );
                                        </script>
                                        {{-- @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif --}}
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="col-md-12">
                                        @if ($profile !== null)
                                        <button  type="submit" class="btn btn-primary col-md-12">Edit</button>
                                        @else
                                        <button type="submit" class="btn btn-primary col-md-12">Save
                                            changes</button>
                                        @endif
                                    </div>
                                </div>
                            </form>
                    </div>
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
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
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
  
  @include('includes.footerapp')
  