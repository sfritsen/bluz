    @include('partials/header')

    <div class="container-fluid">
        <div class="row">
            <div class="col login_header">
                    {{-- <i class="material-icons md-85 login_logo_icon">landscape</i> --}}
                    <i class="fas fa-atom"></i>
                <div class="login_logo_text">{{ config('app.name', 'Laravel') }}</div>
            </div>
        </div>
        <div class="row justify-content-center login_form_cage">
            <div class="col-md-4">

                @yield('content')

            </div>
        </div>
    </div>

</body>
</html>