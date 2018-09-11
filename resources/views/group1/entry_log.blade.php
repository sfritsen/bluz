@if ($entry_count > 0)
    <table class="table table-hover data_table">
        <thead>
            <tr>
                <th scopt="col">Time</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Lynx</th>
                <th scope="col">Chat ID</th>
                <th scope="col">Type</th>
                <th scopt="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($entry_log as $row)
            <tr>
                <td>{{ date("h:i:s a", strtotime($row->created_at)) }}</td>
                <td>{{ $row->phone_number }}</td>
                <td>{{ $row->lynx }}</td>
                <td>{{ $row->chat_session_id }}</td>
                <td>{{ $row->menu_text }}</td>
                <td align="right">
                    <i class="fas fa-edit table_icon" title="Edit"></i> 
                    <i class="fas fa-info-circle table_icon" title="Details" data-toggle="modal" data-target="#entry_details_modal"></i>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif