@extends('layouts.app')

@section('content')

<div class="container"> {{-- Main container --}}
    <div class="row"> {{-- Main row --}}
        <div class="col-2 sidebar_background"> {{-- Left column --}}
            @include('group1/sidebar')
        </div> {{-- END Left column --}}
        <div class="col"> {{-- Right column --}}
            <div class="container"> {{-- Entry form container --}}
                <div class="row">
                    {{-- Include group header --}}
                    @include('partials/group_header')
                </div>

                {{-- Include validation errors --}}
                @include('partials/validation_errors')

                <form method="POST" action="{{ route('g1_submit_entry') }}">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col">

                            <hr>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4">
                                        <input type="text" name="agent_id" id="agent_id" class="form-control" placeholder="Agent ID" value="{{ old('agent_id') }}">
                                    </div>
                                    <div class="col">
                                        <button id="smtp_address" class="normal_button" value="">MoC</button>
                                        <input type="hidden" id="open_moc" value="" />
                                        <span id="show_agent_info" class="show_agent_info"></span>
                                    </div>
                                </div>
                            </div>
                
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <input type="text" name="phone_number" class="form-control" placeholder="Client STN" value="{{ old('phone_number') }}">
                                    </div>
                                    <div class="col">
                                        <input type="text" name="lynx" class="form-control" placeholder="Ticket Number" value="{{ old('lynx') }}">
                                    </div>
                                    <div class="col">
                                        <input type="text" name="chat_session_id" class="form-control" placeholder="Chat Session ID" value="{{ old('chat_session_id') }}">
                                    </div>
                                </div>
                            </div>
                
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <select name="incident_type" class="custom-select">
                                            <option disabled selected>Incident Type</option>
                                            <option disabled>---------------------</option>
                                            @foreach($dd_incident_type as $menu_text => $menu_id)
                                                <option value="{{ $menu_id }}" {{(old('incident_type') == $menu_id?'selected':'')}} >{{ $menu_text }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select name="equip_type" class="custom-select">
                                            <option disabled selected>Equipment Type</option>
                                            <option disabled>---------------------</option>
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
                                        <select name="resolution" class="custom-select">
                                            <option disabled selected>Resolution</option>
                                            <option disabled>---------------------</option>
                                            @foreach($dd_resolution as $menu_text => $menu_id)
                                                <option value="{{ $menu_id }}" {{(old('resolution') == $menu_id?'selected':'')}} >{{ $menu_text }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select name="troubleshooting" class="custom-select">
                                            <option disabled selected>Troubleshooting</option>
                                            <option disabled>---------------------</option>
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
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="client_no_ts" id="client_no_ts" value="{{ old('phone_number', 1) }}">
                                            <label class="form-check-label" for="client_no_ts">Client Unwilling / Unable to TS</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="invalid_ref" id="invalid_ref" value="{{ old('invalid_ref', 1) }}">
                                            <label class="form-check-label" for="invalid_ref">Invalid Insight Referral</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                
                            <hr>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <select class="custom-select" name="cat_box_1" id="cat_box_1">
                                            <option disabled selected>Category 1</option>
                                            @foreach($cat_lvl1 as $lvl1)
                                                <option value="{{ $lvl1->lvl1_id }}" {{(old('cat_box_1') == $lvl1->lvl1_id?'selected':'')}} >{{ $lvl1->lvl1_menu_item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="custom-select" name="cat_box_2" id="cat_box_2">
                                            <option disabled selected>Category 2</option>
                                            @foreach($cat_lvl2 as $lvl2)
                                                <option value="{{ $lvl2->lvl2_id }}" data-chained="{{ $lvl2->lvl1_id }}" {{(old('cat_box_2') == $lvl2->lvl2_id?'selected':'')}} >{{ $lvl2->lvl2_menu_item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="custom-select" name="cat_box_3" id="cat_box_3">
                                            <option disabled selected>Category 3</option>
                                            @foreach($cat_lvl3 as $lvl3)
                                                <option value="{{ $lvl3->lvl3_id }}" data-chained="{{ $lvl3->lvl2_id }}" {{(old('cat_box_3') == $lvl3->lvl3_id?'selected':'')}} >{{ $lvl3->lvl3_menu_item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                
                            <hr>
                
                            <div class="form-group">
                                <textarea class="form-control" name="additional_notes" id="additional_notes" rows="3" placeholder="Additional Notes">{{ old('additional_notes') }}</textarea>
                            </div>
                
                            <hr>
                
                            <button type="submit" class="btn btn-primary">Submit</button> 
                            <button type="reset" class="btn btn-primary">Reset</button>

                            {{-- Store returned JSON data from agent search --}}
                            <input type="hidden" name="emp_info_name" id="emp_info_name" value="" />
                            <input type="hidden" name="emp_info_id" id="emp_info_id" value="" />
                            <input type="hidden" name="emp_info_city" id="emp_info_city" value="" />
                            <input type="hidden" name="emp_info_mgr_id" id="emp_info_mgr_id" value="" />
                            <input type="hidden" name="emp_info_mgr_name" id="emp_info_mgr_name" value="" />
                            <input type="hidden" name="emp_info_title" id="emp_info_title" value="" />
                
                        </div>
                    </div>
                </form>

                {{-- Add entry log --}}
                @include('group1/entry_log')

            </div> {{-- END Entry form container --}}
        </div> {{-- END Right column --}}
    </div> {{-- END Main row --}}
</div> {{-- END Main container --}}

<script>
$(document).ready(function(){

    // On load stuff
	$('#agent_id').focus();
	$('#smtp_address').hide();

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
                    $("#smtp_address").hide();
                }
                else
                {
                    $("#smtp_address").show();
                }
            }
        });
    });

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