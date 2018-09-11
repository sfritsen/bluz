@extends('layouts.app')

@section('sidebar')
    @include('group1/sidebar')
@endsection

@section('content')
<div class="container-fluid"> {{-- Entry form container --}}
    <div class="row">
        <div class="col">
            {{-- Include validation errors --}}
            @include('partials/validation_errors')

            <form method="POST" action="{{ route('g1_submit_entry') }}">
                @csrf

                <div class="form-group">
                    <div class="row">
                        <div class="col-2">
                            <input type="text" name="agent_id" id="agent_id" class="form-control required" placeholder="Agent ID" value="{{ old('agent_id') }}" required autofocus>
                        </div>
                        <div class="col-sm-auto">
                            <button type="button" id="smtp_address" class="btn agent_info_btn" value="">Message</button>
                            <button type="button" id="echo" data-toggle="modal" data-target="#echo_modal" class="btn agent_info_btn" value="">Echo</button>
                            <input type="hidden" id="open_moc" value="" />
                        </div>
                        <div class="col-sm-auto">
                            <div id="show_agent_info"></div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <input type="text" name="phone_number" class="form-control required" placeholder="Client STN" value="{{ old('phone_number') }}" required>
                        </div>
                        <div class="col">
                            <input type="text" name="lynx" id="validationCustom01" class="form-control required" placeholder="Ticket Number" value="{{ old('lynx') }}" required>
                        </div>
                        <div class="col">
                            <input type="text" name="chat_session_id" class="form-control required" placeholder="Chat Session ID" value="{{ old('chat_session_id') }}" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <select name="incident_type" class="form-control required" required>
                                <option value="" disabled selected hidden>Incident Type</option>
                                @foreach($dd_incident_type as $menu_text => $menu_id)
                                    <option value="{{ $menu_id }}" {{(old('incident_type') == $menu_id?'selected':'')}} >{{ $menu_text }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <select name="equip_type" class="form-control required" required>
                                <option value="" disabled selected hidden>Equipment Type</option>
                                @foreach($dd_equip_type as $menu_text => $menu_id)
                                    <option value="{{ $menu_id }}" {{(old('equip_type') == $menu_id?'selected':'')}} >{{ $menu_text }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <select name="resolution" class="form-control required" required>
                                <option value="" disabled selected hidden>Resolution</option>
                                @foreach($dd_resolution as $menu_text => $menu_id)
                                    <option value="{{ $menu_id }}" {{(old('resolution') == $menu_id?'selected':'')}} >{{ $menu_text }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <select name="troubleshooting" class="form-control required" required>
                                <option value="" disabled selected hidden>Troubleshooting</option>
                                @foreach($dd_troubleshooting as $menu_text => $menu_id)
                                    <option value="{{ $menu_id }}" {{(old('troubleshooting') == $menu_id?'selected':'')}} >{{ $menu_text }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="client_no_ts" id="client_no_ts" value="{{ old('client_no_ts', 1) }}">
                                <label class="custom-control-label" for="client_no_ts">Client Unwilling / Unable to TS</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="invalid_ref" id="invalid_ref" value="{{ old('invalid_ref', 1) }}">
                                <label class="custom-control-label" for="invalid_ref">Invalid Insight Referral</label>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <select class="form-control spaced_select required" name="cat_box_1" id="cat_box_1" required>
                                <option value="" disabled selected hidden>Category 1</option>
                                @foreach($cat_lvl1 as $lvl1)
                                    <option value="{{ $lvl1->lvl1_id }}" {{(old('cat_box_1') == $lvl1->lvl1_id?'selected':'')}} >{{ $lvl1->lvl1_menu_item }}</option>
                                @endforeach
                            </select>
                            <select class="form-control spaced_select required" name="cat_box_2" id="cat_box_2" required>
                                <option value="" disabled selected hidden>Category 2</option>
                                @foreach($cat_lvl2 as $lvl2)
                                    <option value="{{ $lvl2->lvl2_id }}" data-chained="{{ $lvl2->lvl1_id }}" {{(old('cat_box_2') == $lvl2->lvl2_id?'selected':'')}} >{{ $lvl2->lvl2_menu_item }}</option>
                                @endforeach
                            </select>
                            <select class="form-control required" name="cat_box_3" id="cat_box_3" required>
                                <option value="" disabled selected hidden>Category 3</option>
                                @foreach($cat_lvl3 as $lvl3)
                                    <option value="{{ $lvl3->lvl3_id }}" data-chained="{{ $lvl3->lvl2_id }}" {{(old('cat_box_3') == $lvl3->lvl3_id?'selected':'')}} >{{ $lvl3->lvl3_menu_item }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <textarea style="height: 100%;" class="form-control" name="additional_notes" id="additional_notes" rows="3" placeholder="Additional Notes">{{ old('additional_notes') }}</textarea>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="form-group">
                    <button type="submit" class="btn form_btn">Submit</button> 
                    <button type="reset" class="btn form_btn" onclick="location.href='{{ route('g1_entry') }}'">Reset</button>
                </div>

                {{-- Store returned JSON data from agent search --}}
                <input type="hidden" name="emp_info_name" id="emp_info_name" value="" />
                <input type="hidden" name="emp_info_id" id="emp_info_id" value="" />
                <input type="hidden" name="emp_info_city" id="emp_info_city" value="" />
                <input type="hidden" name="emp_info_mgr_id" id="emp_info_mgr_id" value="" />
                <input type="hidden" name="emp_info_mgr_name" id="emp_info_mgr_name" value="" />
                <input type="hidden" name="emp_info_title" id="emp_info_title" value="" />

            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            {{-- Add entry log --}}
            @include('group1/entry_log')
        </div>
    </div>
</div>

{{-- Include the echo modal --}}
@include('partials/echo')

{{-- Include the entry details modal --}}
@include('group1/entry_details')

<script>
// Used to mark inputs as required if empty
$("input.required, select.required").change(function(){
    field_val = $(this).val();
    if(field_val == '') {
        $(this).addClass('required');
    } else {
        $(this).removeClass('required');
    }
});

$(document).ready(function(){
    // On load stuff
    $('#smtp_address, #echo').hide();

    // Agent ID Fetcher, not with your teeth though
    $("#agent_id").focusout(function(){

        var agent_info = $("#agent_id").val();

        $.ajax({
            type: "post",
            url: "includes/ajax_id.php",
            data: "agent_id="+agent_info,
            dataType: 'json',
            success: function(data){
                $("#show_agent_info").hide().html(data.agent_info).fadeIn();
                $('#emp_info_name').val(data.employee_name);
                $('#emp_info_id').val(data.employee_id);
                $('#emp_info_city').val(data.employee_city);
                $('#emp_info_mgr_id').val(data.employee_mgr_id);
                $('#emp_info_mgr_name').val(data.employee_mgr_name);
                $('#emp_info_title').val(data.employee_title);
                $('#open_moc').val(data.smtp_address);

                if(!$("#open_moc").val())
                {
                    $("#smtp_address, #echo").hide();
                }
                else
                {
                    $("#smtp_address, #echo").show();
                }
            }
        });
    });

    // JQuery chain selects
    $(function(){
        $("#cat_box_2").chained("#cat_box_1");
        $("#cat_box_3").chained("#cat_box_2");
    });

    // Opens MoC chat with found agent email
    $("#smtp_address").click(function(){
        agent_email = document.getElementById("open_moc").value;
        window.location = "sip:"+ agent_email;

        return false;
    });
});
</script>
@endsection