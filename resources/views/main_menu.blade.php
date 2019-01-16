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
            <div class="col mm_form_cage">

                @if($groups->count() === '0')
                    <div class="info_msg">You do not have access to any groups.  Please contact your manager</div>
                @endif

                @foreach($groups as $row)

                    @php
                    // Get the routes
                    $entry = $row->entry_route;
                    $admin = $row->admin_route;
                    @endphp

                    @if(Auth::user()->permission->$entry === 1)
                        <div class="mm_plate">
                            <a href="{!! url('/'.$row->entry_route) !!}" class="mm_left">
                                {{ $row->name }}
                            </a>

                            @if(Auth::user()->permission->$admin === 1)
                                <a href="{!! url('/'.$row->admin_route) !!}" class="mm_right">
                                    Admin
                                </a>
                            @endif
                        </div>
                    @else
                        {{-- <div class="info_msg">You do not have access to any groups.  Please contact your manager</div> --}}
                    @endif

                @endforeach

                {{-- User management --}}
                @if(Auth::user()->permission->user_management === 1)
                    <div class="mm_plate">
                        <a href="#" class="mm_left">
                            User Management
                        </a>
                    </div>
                @endif

            </div>
        </div>
    </div>

    {{-- Include the footer container --}}
    @include('partials/footer')

</body>
</html>
