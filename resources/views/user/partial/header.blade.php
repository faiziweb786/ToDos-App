<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
              <a class="navbar-brand text-white" href="{{ route('welcome') }}">
              @if($logo = \App\Models\Logo::first())
                  <img class="img-fluid rounded-circle border-danger" src="{{ asset('storage/logo/' . $logo->image) }}" width="100px" height="100px" alt="Photo">
              @endif
              </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa-solid fa-bars" style="color: #f9fafa;"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">{{ __('Home') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('about-us') }}">{{ __('About') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('viewdata') }}">{{ __('Items') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('services') }}#services">{{ __('services') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('contact-us') }}">{{ __('Contact') }}</a>
          </li>
             {{--  <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>  --}}
        </ul>
         <ul class="navbar-nav me-auto mb-lg-0">
             <!-- Authentication Links -->
              @guest
                  @if (Route::has('login'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                      </li>
                  @endif
  
                  @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                  @endif
                  @else
                  <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link" href="#" role="button" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
              @endguest
         </ul>
      </div>
    </div>
  </nav>
  