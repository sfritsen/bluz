<div class="container-fluid">
    <div class="row section_title">
        <div class="col">Employee Information</div>
    </div>
    <div class="row">
        <div class="col section_label">Name</div>
        <div class="col section_text">{{ $record->emp_info_name." - ".$record->emp_info_id }}</div>
        <div class="col section_label">City</div>
        <div class="col section_text">{{ $record->emp_info_city }}</div>
    </div>
    <div class="row row1">
        <div class="col section_label">Manager</div>
        <div class="col section_text">{{ $record->emp_info_mgr_name }}</div>
        <div class="col section_label">Manager ID</div>
        <div class="col section_text">{{ $record->emp_info_mgr_id }}</div>
    </div>
    <div class="row section_title">
        <div class="col">Record Details</div>
    </div>
    <div class="row">
        <div class="col section_label">Phone Number</div>
        <div class="col section_text">{{ $record->phone_number }}</div>
        <div class="col section_label">Lynx Ticket</div>
        <div class="col section_text">{{ $record->lynx }}</div>
    </div>
    <div class="row row1">
        <div class="col section_label">Chat ID</div>
        <div class="col section_text">{{ $record->chat_session_id }}</div>
        <div class="col section_label">Incident Type</div>
        <div class="col section_text">{{ $record->incident_type }}</div>
    </div>
    <div class="row">
        <div class="col section_label">Equipment</div>
        <div class="col section_text">{{ $record->equip_type }}</div>
        <div class="col section_label">Resolution</div>
        <div class="col section_text">{{ $record->resolution }}</div>
    </div>
    <div class="row row1">
        <div class="col section_label">Client Troubleshooting</div>
        <div class="col section_text">{{ $record->client_no_ts }}</div>
        <div class="col section_label">Invalid Insight</div>
        <div class="col section_text">{{ $record->invalid_ref }}</div>
    </div>
    <div class="row section_title">
        <div class="col">Category</div>
    </div>
    <div class="row">
        <div class="col section_text">
            {!! $record->category_1.' &#9679; '.$record->category_2.' &#9679; '.$record->category_3 !!}
        </div>
    </div>
    <div class="row section_title">
        <div class="col">Additional Information</div>
    </div>
    <div class="row">
        <div class="col section_text">
            {!! nl2br($record->additional_notes) !!}
        </div>
    </div>
</div>