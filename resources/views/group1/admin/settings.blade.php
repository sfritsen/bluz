@extends('layouts.app')

@section('sidebar')
    @include('group1/sidebar')
@endsection

@section('content')

    <div class="container-fluid nopadding">
        <div class="row">
            <div class="col">

                <div>This is your group name. Max characters allowed is 25</div>
                
                {{-- Include validation errors --}}
                @include('partials/validation_errors')

                <form class="form-inline" method="POST" action="{{ route('g1_admin_group_name_submit') }}">
                    @csrf
                    <input type="text" name="group_name" id="group_name" class="form-control" placeholder="{{ $group_name }}" value="{{ old('group_name') }}" required>
                    <button type="submit" class="btn form_btn">Save</button>
                </form>
  
            </div>
        </div>
    </div>

@endsection