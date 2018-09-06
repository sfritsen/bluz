@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Group 1</div>

                <div class="card-body">
					<a href="{!! url('/g1_entry'); !!}">Entry Form</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
