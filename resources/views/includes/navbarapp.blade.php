<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	<div class="container-fluid px-md-4	">
	      <a class="navbar-brand" href="/">SkillHunt</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="/" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="/jobs" class="nav-link">Browse Jobs</a></li>
                <li class="nav-item"><a href="/contact" class="nav-link">Contact</a></li>
                {{-- <li class="nav-item"><a href="candidates.html" class="nav-link">Canditates</a></li> --}}
                @guest
                <li class="nav-item cta mr-md-1"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                <li class="nav-item cta cta-colored"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                @else
                @if(Auth::user()->role == 1)
                <li class="nav-item  mr-md-1"><a href="/myjobs" class="nav-link">My Jobs</a></li>
                <li class="nav-item  mr-md-1"><a href="/messages" class="nav-link">Messages  @include('messenger.unread-count')</a></li>
                <li class="nav-item cta mr-md-1"><a href="/profile/{{str_slug(strtolower(Auth::user()->name), '-')}}" class="nav-link">Profile</a></li>
                <li class="nav-item cta cta-colored"><a class="nav-link" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                   Logout
               </a></li>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
                @endif
                @if(Auth::user()->role == 2)
                <li class="nav-item mr-md-1"><a href="/messages" class="nav-link">Messages  @include('messenger.unread-count')</a></li>
                <li class="nav-item cta mr-md-1"><a href="/dashboard" class="nav-link">Dashboard</a></li>
                <li class="nav-item cta mr-md-1"><a href="/profile/{{str_slug(strtolower(Auth::user()->name), '-')}}" class="nav-link">Client profile</a></li>
                <li class="nav-item cta cta-colored"><a class="nav-link" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                   Logout
               </a></li>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
                @endif
                @if(Auth::user()->role == 3)
                <li class="nav-item mr-md-1"><a href="/messages" class="nav-link">Messages  @include('messenger.unread-count')</a></li>
                <li class="nav-item cta mr-md-1"><a href="/adminpanel/statistic" class="nav-link">Admin page</a></li>
                <li class="nav-item cta cta-colored"><a class="nav-link" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                   Logout
               </a></li>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
                @endif
                @endguest
                </ul>
          </div>
          <script type="text/javascript">
            $(document).ready(function () {
                var url = window.location;
                $('ul.nav a[href="'+ url +'"]').parent().addClass('active');
                $('ul.nav a').filter(function() {
                     return this.href == url;
                }).parent().addClass('active');
            });
        </script> 
	</div>
</nav>
