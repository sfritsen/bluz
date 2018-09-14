@extends('layouts.main_menu')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">

                @foreach($groups as $row)

                    @php
                    // Get the routes
                    $entry = $row->entry_route;
                    $admin = $row->admin_route;
                    @endphp

                    @if(Auth::user()->permission->$entry === 1)
                        <div class="mm_plate">
                            <a href="{!! url('/'.$row->entry_route) !!}">
                                <div class="mm_left">
                                    {{ $row->name }}
                                </div>
                            </a>

                            @if(Auth::user()->permission->$admin === 1)
                                <a href="{!! url('/'.$row->admin_route) !!}">
                                    <div class="mm_right">
                                        Admin
                                    </div>
                                </a>
                            @endif

                        </div>
                    @else
                        <div class="info_msg">You do not have access to any groups.  Please contact your manager</div>
                    @endif

                @endforeach

            </div>
        </div>
    </div>
@endsection
