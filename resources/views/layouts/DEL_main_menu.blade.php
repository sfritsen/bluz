    @include('partials/header')

    <div class="container-fluid">
        <div class="row">
            <div class="col mm_header">
                <i class="material-icons md-85 mm_logo_icon">landscape</i>
                <div class="mm_logo_text">{{ config('app.name', 'Laravel') }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col mm_form_cage">

                @yield('content')

            </div>
        </div>
    </div>

    {{-- Include the footer container --}}
    @include('partials/footer')

</body>
</html>