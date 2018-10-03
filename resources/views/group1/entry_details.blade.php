<table class="table">
    <tr>
        <th colspan="4">Employee Information</th>
    </tr>
    <tr>
        <td class="label">Name</td>
        <td>{{ $record->emp_info_name }}</td>
        <td class="label">City</td>
        <td>{{ $record->emp_info_city }}</td>
    </tr>
    <tr>
        <td class="label">Agent ID</td>
        <td>{{ $record->emp_info_id }}</td>
        <td class="label">Manager</td>
        <td>{{ $record->emp_info_mgr_name }}</td>
    </tr>
    <tr>
        <th colspan="4">Record Details</th>
    </tr>
    <tr>
        <td class="label">Phone Number</td>
        <td>{{ $record->phone_number }}</td>
        <td class="label">Lynx Ticket</td>
        <td>{{ $record->lynx }}</td>
    </tr>
    <tr>
        <td class="label">Chat ID</td>
        <td>{{ $record->chat_session_id }}</td>
        <td class="label">Incident Type</td>
        <td>{{ $record->dd_incident_type }}</td>
    </tr>
    <tr>
        <td class="label">Equipment</td>
        <td>{{ $record->dd_equip_type }}</td>
        <td class="label">Troubleshooting</td>
        <td>{{ $record->dd_troubleshooting }}</td>
    </tr>
    <tr>
        <td class="label">Client Troubleshooting</td>
        <td>
            @if ($record->client_no_ts === 1)
                Yes
            @else
                No
            @endif
        </td>
        <td class="label">Invalid Insight</td>
        <td>
            @if ($record->invalid_ref === 1)
                Yes
            @else
                No
            @endif
        </td>
    </tr>
    <tr>
        <td class="label">Resolution</td>
        <td>{{ $record->dd_resolution }}</td>
        <td class="label"></td>
        <td></td>
    </tr>
    <tr>
        <th colspan="4">Category</th>
    </tr>
    <tr>
        <td>{!! $record->category_1 !!}</td>
        <td>{!! $record->category_2 !!}</td>
        <td colspan="2">{!! $record->category_3 !!}</td>
    </tr>
    <tr>
        <th colspan="4">Additional Information</th>
    </tr>
    <tr>
        <td colspan="4">{!! nl2br($record->additional_notes) !!}</td>
    </tr>
</table>