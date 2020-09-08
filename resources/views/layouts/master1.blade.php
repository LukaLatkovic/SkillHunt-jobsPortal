<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.headapp')
</head>
    <body>
        @include('includes.navbarappmessenger')
        <div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
                <div class="container">
                    <div class="row no-gutters slider-text align-items-end justify-content-start">
                        <div class="col-md-12 ftco-animate text-center mb-5">
                        <h1 class="mb-3 bread">Messenger</h1>
                        </div>
                    </div>
                </div>
        </div>
            <section class="ftco-section bg-light">
                <div class="container">
        @yield('content')
                </div>
            </section>
        @include('includes.footerapp')
    </body>
</html>