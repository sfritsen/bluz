@if ($entry_count_today > 0)
    <table class="table table-hover data_table">
        <thead>
            <tr>
                <th scope="col">Time</th>
                <th scope="col">Agent</th>
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
                <td>{{ $row->emp_info_name }}</td>
                <td>{{ $row->phone_number }}</td>
                <td>{{ $row->lynx }}</td>
                <td>{{ $row->chat_session_id }}</td>
                <td>{{ $row->menu_text }}</td>
                <td align="right">
                    <i class="material-icons table_icon" title="Edit Record">edit</i>
                    <i class="material-icons table_icon" title="Entry Details" data-toggle="modal" data-target="#entry_details_modal">info</i>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif