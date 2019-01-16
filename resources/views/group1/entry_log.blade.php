{{ $entry_records->links() }}
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
        @foreach($entry_records as $row)
        <tr>
            <td>{{ date($date_format, strtotime($row->created_at)) }}</td>
            <td>{{ $row->emp_info_name }}</td>
            <td>{{ $row->phone_number }}</td>
            <td>{{ $row->lynx }}</td>
            <td>{{ $row->chat_session_id }}</td>
            <td>{{ $row->menu_text }}</td>
            <td align="right">
                {{-- Icons are set in config/icon_ref.php --}}
                <i class="{!! config('icon_ref.edit') !!} table_icon" title="Edit"></i>
                <i href="{{ url('g1_record_details/'.$row->id) }}" data-remote="false" class="{!! config('icon_ref.info') !!} table_icon" title="Info" data-toggle="modal" data-target="#entry_details_modal"></i>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $entry_records->links() }}

{{-- Make sure to add the modal --}}
@include('group1/modal_entry_details')

<script>
// Retrieves the entry details and loads it into modal_entry_details
$("#entry_details_modal").on("show.bs.modal", function(e) {
    var link = $(e.relatedTarget);
    $(this).find(".modal-body").load(link.attr("href"));
});
</script>