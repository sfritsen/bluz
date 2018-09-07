<table class="table table-hover entry_log_table">
    <thead>
        <tr>
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
            <td>{{ $row->phone_number }}</td>
            <td>{{ $row->lynx }}</td>
            <td>{{ $row->chat_session_id }}</td>
            <td>{{ $row->incident_type }}</td>
            <td align="right">
                <i class="fas fa-edit table_icon" title="Edit"></i> 
                <i class="fas fa-info-circle table_icon" title="Details"></i>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>