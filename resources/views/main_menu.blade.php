@extends('layouts.main_menu')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">

            @foreach($groups as $row)

                <div class="card mm_card">
                    <div class="card-header">{{ $row->name }}</div>

                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="{!! url('/'.$row->entry_route) !!}">Entry Form</a></li>
                            <li class="list-group-item"><a href="{!! url('/'.$row->admin_route) !!}">Administration</a></li>
                        </ul>
                    </div>

                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>

            @endforeach

        </div>
    </div>
</div>
@endsection
