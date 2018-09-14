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
                    <table class="table table-hover data_table">
                        <thead>
                            <tr>
                                <th scopt="col">Submitted</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Lynx</th>
                                <th scope="col">Chat ID</th>
                                <th scope="col">Type</th>
                                <th scopt="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($entry_history as $row)
                            <tr>
                                <td>{{ date("M d Y h:i:s a", strtotime($row->created_at)) }}</td>
                                <td>{{ $row->phone_number }}</td>
                                <td>{{ $row->lynx }}</td>
                                <td>{{ $row->chat_session_id }}</td>
                                <td>{{ $row->menu_text }}</td>
                                <td align="right">
                                    <i class="fas fa-edit table_icon" title="Edit"></i> 
                                    <i class="fas fa-info-circle table_icon" title="Details"></i>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>

@endsection