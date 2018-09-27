@extends('layouts.app')

@section('sidebar')
    @include('group1/sidebar')
@endsection

@section('content')

    <div class="container-fluid nopadding">
        <div class="row">
            <div class="col table_title">
                <i class="material-icons md-24">history</i> History
            </div>
            <div class="col table_title_records">
                {{ $history_count }} found
            </div>
        </div>
        <div class="row">
            <div class="col">
                @if ($history_count > 0)
                    @include('group1/entry_log')
                @endif
            </div>
        </div>
    </div>

@endsection