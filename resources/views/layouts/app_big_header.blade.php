@include('partials/header')

    <div class="container-fluid">
        <div class="row">
            <div class="col mm_header">
                <i class="{!! config('constants.site_logo') !!} mm_logo_icon"></i>
                <div class="mm_logo_text">{{ config('app.name', 'Laravel') }}</div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            
            {{-- Requires col div in content --}}
            @yield('content')

        </div>
    </div>

    {{-- Include the footer container --}}
    @include('partials/footer')

</body>
</html>