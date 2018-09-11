@include('partials/header')

    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-2 h-100 sidebar"> {{-- Sidebar --}}
                @yield('sidebar')
            </div>
            <div class="col nopadding"> {{-- Content --}}
                <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                    <div class="container-fluid nopadding">
                        <a class="navbar-brand" href="{{ route('g1_entry') }}">
                            {{ $group->name }}
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>
        
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarModulesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Modules
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarModulesDropdown">
                                        <a class="dropdown-item" href="#">Applications</a>
                                        <a class="dropdown-item" href="#">Text Pad</a>
                                        <a class="dropdown-item" href="#">Chat Text</a>
                                        <a class="dropdown-item" href="#">Notes</a>
                                        <a class="dropdown-item" href="#">Stop Watch</a>
                                        <a class="dropdown-item" href="#">Web Tools</a>
                                    </div>
                                </li>
                            </ul>
        
                            {{-- Navbar Right --}}
                            <ul class="navbar-nav ml-auto">
                                {{-- Auth Links --}}
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarUserDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>
        
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarUserDropdown">
                                            <a class="dropdown-item" href="#">My Account</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
        
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>

                <main class="py-3">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

</body>
</html>