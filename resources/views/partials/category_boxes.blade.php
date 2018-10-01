@extends('layouts.app')

@section('sidebar')
    @include('group1/sidebar')
@endsection

@section('content')
   
    <div class="container-fluid nopadding">
        <div class="row">
            <div class="col">
                <a href="{{ url('g1_cat_boxes/1/0') }}">Category Main</a> &#9679; <a href="">Trash Bin</a> &#9679; <a href="">Another Item</a>
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
                    <input type="hidden" id="type" value="{{ $type }}">
                    <input type="hidden" id="is_under" value="{{ $is_under }}">
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

                <table id="cat_table" class="table data_table">
                    <thead>
                        <tr>
                            <th scope="col">Box Item</th>
                            <th scope="col">Added</th>
                            <th scope="col">Last Updated</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($category_items as $item)

                        {{-- Figure out which level we're on and set the proper label --}}
                        <?php 
                        if ($item->cat1_label !== "-"){
                            $item_label = $item->cat1_label;
                        }elseif ($item->cat2_label !== "-"){
                            $item_label = $item->cat2_label;
                        }elseif ($item->cat3_label !== "-"){
                            $item_label = $item->cat3_label;
                        }elseif ($item->cat4_label !== "-"){
                            $item_label = $item->cat4_label;
                        }
                        ?>

                        <tr id="{{ $item->id }}">
                            <td><a href="{{ url('g1_cat_boxes/'.$next_level.'/'.$item->id) }}">{{ $item_label }}</a></td>
                            <td>{{ $item->created_at }}</td>
                            <td><span id="updated_val_{{ $item->id }}">{{ $item->updated_at }}</span></td>
                            <td align="right"><button type="button" class="btn table_btn del_btn" value="{{ $item->id }}">Delete</button></td>
                            <td align="right">
                                <?php
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

        $("#add_item_btn").click(function(){

            // Gets the value of item
            var item = $("#new_item").val();
            var type = $("#type").val();
            var is_under = $("#is_under").val();

            // Sends the info to the route to be saved
            $.ajax({
                type: "get",
                url: "{{ url('g1_cat_boxes_save') }}",
                data: {item: item, type: type, is_under: is_under},
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
                    $('#cat_table tbody').hide().append('<tr id="'+data.id+'"><td><a href="{{ url('g1_cat_boxes/'.$next_level) }}/'+data.id+'">'+data.item+'</a></td>'+
                        '<td>'+data.created_at+'</td>'+
                        '<td><span id="updated_val_'+data.id+'">'+data.updated_at+'</span></td>'+
                        '<td align="right"><button type="button" class="btn table_btn del_btn" value="'+data.id+'">Delete</button></td>'+
                        '<td align="right"><label class="switch switch_type1" role="switch">'+
                        '<input type="checkbox" class="switch__toggle" value="'+data.id+'" '+checked+'>'+
                        '<span class="switch__label"></span>'+
                        '</label>'+
                        '</td></tr>').fadeIn(600);

                    // Display message
                    $("#testresults").html(data.item);

                    // Sort rows based on label
                    var asc = 'asc';
                    tbody = $('#cat_table').find('tbody');

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

        // Controls the toggle switches
        $(document).on('click', '.switch__toggle', function(){ /* Using the class since it's in a loop above */
            var id = $(this).val(); /* Gets the value of the clicked element */
            var state = $(this).prop('checked'); /* Checks if the item is checked or not */

            // Sends the change and displays returned message
            $.ajax({
                type: "get",
                url: "{{ url('g1_cat_boxes_edit') }}/"+id+"/"+state,
                success: function(data){
                    $("#testresults").html(id + ' = ' + state); /* DEBUGGING or success message */
                    $("#updated_val_"+id).html(data); /* Sends the new update time to the field */
                }
            });
        });

        // Deletes the item by setting active to 9
        $("#cat_table").on('click', '.del_btn', function() { /* Using the class since it's in a loop above */
            var id = $(this).val(); /* Gets the value of the item to delete */

            // Sends the change and displays returned message
            $.ajax({
                type: "get",
                url: "{{ url('g1_cat_boxes_delete') }}/"+id,
                success: function(data){
                    $("#testresults").html(id + ' deleted'); /* DEBUGGING or success message */
                    $("#updated_val_"+id).html(data); /* Sends the new update time to the field */
                }
            });

            // Removes the row
            $(this).closest('tr').remove();
        });
    });
    </script>

@endsection