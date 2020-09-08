{{-- @extends('layout.app') --}}
@include('includes.headapp')
@include('includes.navbarapp')
@section('content')
<div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-start">
        <div class="col-md-12 ftco-animate text-center mb-5">
          <h1 class="mb-3 bread">Contact us</h1>
        </div>
      </div>
    </div>
</div>
    <section class="ftco-section bg-light">
        <div class="container">
            @include('flash-message')
            {{-- main --}}
            <div class="py-5">
                <div class="container ftco-animate">
                  <h2 class="mb-5 text-center">Contact the Skillhunt team</h2>
                  <div class="row">
                    <div class="col-md-6 mb-3 mb-md-0">
                      <h5>Let's talk about the future of the internet</h5>
                      <p class="mb-5 text-muted">We're here to answer your questions and discuss the decentralized future of the internet.</p>
                    </div>
                    <div class="col-md-6">
                      <form action="/contact" method="POST" >
                        <label class="sr-only" for="input-contacts-01">Email</label>
                        <input class="form-control mb-3" name="name" id="input-contacts-01" type="name" placeholder="Name" required>
                        @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        <input class="form-control mb-3" name="email" id="input-contacts-01" type="email" placeholder="Your e-mail" required>
                        @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        <input class="form-control mb-3" name="subject" id="input-contacts-01" type="subject" placeholder="Subject" required>  
                        @if ($errors->has('subject'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                                @endif
                        <label class="sr-only" for="textarea-contacts-01">Write something...</label>
                        <textarea class="form-control mb-3" name="message" id="textarea-contacts-01" rows="5" placeholder="Write something..." required></textarea>
                        @if ($errors->has('message'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                        <button class="btn btn-primary btn-block" type="submit">Submit</button>
                        @csrf
                      </form>
                    </div>
                  </div>
                </div>
            </div>
            {{-- end main --}}
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