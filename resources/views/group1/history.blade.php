@extends('layouts.app')

@section('sidebar')
    @include('group1/sidebar')
@endsection

@section('content')

    <div class="container-fluid nopadding">
        <div class="row">
            <div class="col table_title">
                <i class="{!! config('icon_ref.history') !!}"></i> My History
            </div>
            <div class="col table_title_records">
                {{ $entry_records->total() }} found
            </div>
        </div>
        <div class="row">
            <div class="col">
                @if ($entry_records->total() > 0)
                    @include('group1/entry_log')
                @endif
            </div>
        </div>
    </div>

@endsection