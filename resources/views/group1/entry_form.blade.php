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
                
                            <hr>
                
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
                
                            Coaching and Kudos Section
                
                            <hr>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <select multiple class="form-control" name="cat_box_1" id="cat_box_1">
                                            @foreach($cat_lvl1 as $lvl1)
                                                <option value="{{ $lvl1->lvl1_id }}" {{(old('cat_box_1') == $lvl1->lvl1_id?'selected':'')}} >{{ $lvl1->lvl1_menu_item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select multiple class="form-control" name="cat_box_2" id="cat_box_2">
                                            @foreach($cat_lvl2 as $lvl2)
                                                <option value="{{ $lvl2->lvl2_id }}" data-chained="{{ $lvl2->lvl1_id }}" {{(old('cat_box_2') == $lvl2->lvl2_id?'selected':'')}} >{{ $lvl2->lvl2_menu_item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select multiple class="form-control" name="cat_box_3" id="cat_box_3">
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
    $(function(){
        $("#cat_box_2").chained("#cat_box_1");
        $("#cat_box_3").chained("#cat_box_2");
    });
});
</script>

@endsection