<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        @if (Auth::user('login'))
        <a class="navbar-brand" href="{{ url('/home') }}">
            <strong>Galeri++</strong>
        </a>
        @else
        <a class="navbar-brand" href="{{ url('/') }}">
            <strong>Galeri++</strong>
        </a>
        @endif
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            @if (Auth::user('login'))    
                <ul class="navbar-nav mr-auto">
                    <li>
                        <a class="nav-link" href="{{ url('/home') }}">Home</a>
                    </li>

                    @if (Auth::check() && Auth::user()->level == 'admin')    
                    <li>
                        <a class="nav-link" href="{{ url('/album') }}">Album</a>
                    </li>
                    @endif

                    @if (Auth::check())
                    <li>
                        <a class="nav-link" href="{{ url('/galeri') }}">Galeri Foto</a>
                    </li>
                    @endif

                    @if (Auth::check() && Auth::user()->level == 'admin')
                    <li>
                        <a class="nav-link" href="{{ url('/user') }}">Manajemen User</a>
                    </li>
                    @endif
                </ul>
            @endif

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    {{-- @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif --}}
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Hi, {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
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