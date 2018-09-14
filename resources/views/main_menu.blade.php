@extends('layouts.main_menu')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">

            @foreach($groups as $row)

                <div class="mm_plate">
                    <a href="{!! url('/'.$row->entry_route) !!}">
                        <div class="mm_left">
                            {{ $row->name }}
                        </div>
                    </a>
                    <a href="{!! url('/'.$row->admin_route) !!}">
                        <div class="mm_right">
                            Admin
                        </div>
                    </a>
                </div>

            @endforeach

        </div>
    </div>
</div>
@endsection
