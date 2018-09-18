<table class="table">
    <tr>
        <th colspan="4">Employee Information</th>
    </tr>
    <tr>
        <td class="section_label">Name</td>
        <td>{{ $record->emp_info_name." - ".$record->emp_info_id }}</td>
        <td class="section_label">City</td>
        <td>{{ $record->emp_info_city }}</td>
    </tr>
    <tr>
        <td class="section_label">Manager</td>
        <td>{{ $record->emp_info_mgr_name }}</td>
        <td class="section_label">Manager ID</td>
        <td>{{ $record->emp_info_mgr_id }}</td>
    </tr>
    <tr>
        <th colspan="4">Record Details</th>
    </tr>
    <tr>
        <td class="section_label">Phone Number</td>
        <td>{{ $record->phone_number }}</td>
        <td class="section_label">Lynx Ticket</td>
        <td>{{ $record->lynx }}</td>
    </tr>
    <tr>
        <td class="section_label">Chat ID</td>
        <td>{{ $record->chat_session_id }}</td>
        <td class="section_label">Incident Type</td>
        <td>{{ $record->dd_incident_type }}</td>
    </tr>
    <tr>
        <td class="section_label">Equipment</td>
        <td>{{ $record->dd_equip_type }}</td>
        <td class="section_label">Resolution</td>
        <td>{{ $record->dd_resolution }}</td>
    </tr>
    <tr>
        <td class="section_label">Client Troubleshooting</td>
        <td>{{ $record->client_no_ts }}</td>
        <td class="section_label">Invalid Insight</td>
        <td>{{ $record->invalid_ref }}</td>
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