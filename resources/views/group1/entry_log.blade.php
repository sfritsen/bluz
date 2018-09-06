{{-- Beginning of entry log --}}
<div class="row">
    <div class="col">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Lynx</th>
                    <th scope="col">Chat ID</th>
                    <th scope="col">Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach($entry_log as $row)
                <tr>
                    <td>{{ $row->phone_number }}</td>
                    <td>{{ $row->lynx }}</td>
                    <td>{{ $row->chat_session_id }}</td>
                    <td>{{ $row->incident_type }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div> 
{{-- END of entry log --}}