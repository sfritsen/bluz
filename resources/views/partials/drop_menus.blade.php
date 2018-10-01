@extends('layouts.app')

@section('sidebar')
    @include('group1/sidebar')
@endsection

@section('content')

    <div class="container-fluid nopadding">
        <div class="row submenu">
            <div class="col">
                <a href="{{ url('g1_dd_menus/0') }}"><div class="item">Home</div></a>
                <a href=""><div class="item">Trash Bin</div></a>
                <a href=""><div class="item">Another Item</div></a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                To add a new item, navigate to the section you want to add the item too and enter the value in the field below.
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <input type="text" id="new_item" class="form-control" placeholder="Add New Item" value="{{ old('new_item') }}" aria-describedby="newHelpBlock" autofocus>
                    <input type="hidden" id="parent_id" value="{{ $parent_id }}">
                    <small>Tip! After entering a value, press TAB then ENTER</small>
                </div>
            </div>
            <div class="col-auto">
                <button type="button" id="add_item_btn" class="btn form_btn">Submit</button>
            </div>
            <div class="col">
                <div id="testresults"></div> {{-- DEBUGGING RETURN INFO ONLY --}}
            </div>
        </div>
        <div class="row">
            <div class="col">

                <table id="menu_table" class="table data_table">
                    <thead>
                        <tr>
                            <th scope="col">Drop Menu</th>
                            <th scope="col">Added</th>
                            <th scope="col">Last Updated</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($menu_records as $item)

                        <?php 
                        if ($item->active !== 1){
                            $row_state = "disabled_row";
                        }else{
                            $row_state = "";
                        }
                        ?>

                        <tr class="{{ $row_state }}" id="{{ $item->id }}">
                            <td><a href="{{ url('g1_dd_menus/'.$item->id) }}">{{ $item->menu_text }}</a></td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->updated_at }}</td>
                            <td align="right">
                                <?php
                                if ($toggle_state !== "0") {
                                if($item->active === 1) {
                                    $state = "checked";
                                }else{
                                    $state = "";
                                }
                                ?>

                                <label class="switch switch_type1" role="switch">
                                    <input type="checkbox" class="switch__toggle" value="{{ $item->id }}" <?php echo $state; ?>>
                                    <span class="switch__label"></span>
                                </label>

                                <?php } ?>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <script>
    $(document).ready(function(){

        // Controls the toggle switches
        $(document).on('click', '.switch__toggle', function(){ /* Using the class since it's in a loop above */
            var id = $(this).val(); /* Gets the value of the clicked element */
            var state = $(this).prop('checked'); /* Checks if the item is checked or not */

            // Sends the change and displays returned message
            $.ajax({
                type: "get",
                url: "{{ url('g1_dd_menus_edit') }}/"+id+"/"+state,
                success: function(data){
                    $("#testresults").html(id + ' = ' + state); /* DEBUGGING or success message */
                    $("#updated_val_"+id).html(data); /* Sends the new update time to the field */
                }
            });

            // If the item is disabled, toggle the row class
            if(state == true) {
                $(this).closest('tr').removeClass('disabled_row');
            } else {
                $(this).closest('tr').addClass('disabled_row');
            }
        });

        $("#add_item_btn").click(function(){

            // Gets the value of item
            var item = $("#new_item").val();
            var parent_id = $("#parent_id").val();

            // Sends the info to the route to be saved
            $.ajax({
                type: "get",
                url: "{{ url('g1_dd_menus_save') }}",
                data: {item: item, parent_id: parent_id},
                dataType: 'json',
                success:function(data){

                    // Checked the active value to set the initial slider state
                    var checked;
                    if (data.active == 1) {
                        checked = "checked";
                    }else{
                        checked = "";
                    }

                    // Append the new row to the table body with a perdy fade in =)
                    $('#menu_table tbody').hide().append('<tr id="'+data.id+'"><td><a href="{{ url('g1_dd_menus/') }}/'+data.id+'">'+data.item+'</a></td>'+
                        '<td>'+data.created_at+'</td>'+
                        '<td><span id="updated_val_'+data.id+'">'+data.updated_at+'</span></td>'+
                        '<td align="right"><label class="switch switch_type1" role="switch">'+
                        '<input type="checkbox" class="switch__toggle" value="'+data.id+'" '+checked+'>'+
                        '<span class="switch__label"></span>'+
                        '</label>'+
                        '</td></tr>').fadeIn(600);

                    // Display message
                    $("#testresults").html(data.item);

                    // Sort rows based on label
                    var asc = 'asc';
                    tbody = $('#menu_table').find('tbody');

                    tbody.find('tr').sort(function(a, b) {
                        if (asc) {
                            return $('td:first', a).text().localeCompare($('td:first', b).text());
                        } else {
                            return $('td:first', b).text().localeCompare($('td:first', a).text());
                        }
                    }).appendTo(tbody);

                    // Clear input value and set focus after submitting
                    $("#new_item").val("").focus();
                }
            });

            return false;
        });

    });
    </script>

@endsection