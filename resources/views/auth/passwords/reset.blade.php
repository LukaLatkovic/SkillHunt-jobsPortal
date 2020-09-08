@extends('layout.app')

@section('content')
<div class="hero-wrap img hero-wrap-2" style="background-image: url(images/bg_1.jpg);">
    <div class="overlay"></div>
    <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-start">
              <div class="col-md-12 ftco-animate text-center mb-5">
                  <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Login</span></p>
                <h1 class="mb-3 bread">Reset password</h1>
              </div>
        </div>
    </div>
    <section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-md-offset-3">
                <div class="card">
                    <div class="card-header">Reset Password</div>
                    <div class="card-body">
                        <form action="password/reset" method="POST">
                            <input type="hidden" name="token" value="$token">
                            {{ csrf_field() }}
                            <label for="email">Email Adress</label>
                            <input type="email" value="$email" class="form-control">
                            <br/>
                            <label for="password">New Password</label>
                            <input type="password" name="password" class="form-control">
                            <label for="password_confirmation">Confirm New Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                            <button type="submit" class="btn btn-primary">Reset password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection