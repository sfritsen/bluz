@include('partials/header')

    {{-- Navbar --}}
    <nav class="navbar navbar-light fixed-top navbar_custom flex-md-nowrap p-0">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ url('/') }}">
            <i class="material-icons logo_icon">landscape</i>{{ config('app.name', 'Laravel') }}
        </a>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap ">
                <a class="nav-link section_title" href="{{ route($section_route) }}">{{ $section_title }}</a>
            </li>
        </ul>
        
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @else
            <div class="ml-auto">   
                <div class="dropdown">
                    <a id="navbarUserDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
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
                </div>
            </div>
        @endguest
    </nav>

    <div class="container-fluid">
        <div class="row">
            
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="sidebar-sticky">
                    @yield('sidebar')
                </div>
            </nav>
                
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    @yield('content')
                </div>
            </main>

        </div>
    </div>
    
</body>
</html>