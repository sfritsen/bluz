@extends('layouts.app')

@section('sidebar')
    @include('group1/sidebar')
@endsection

@section('content')

    <div class="container-fluid nopadding">
        <div class="row submenu">
            <div class="col">
                <a href="{{ url('g1_cat_boxes/1/0') }}"><div class="item">Level 1 Main</div></a>
                <a href="{{ url('g1_cat_boxes_trash') }}"><div class="item">Trash Bin</div></a>
                <a href="" data-toggle="modal" data-target="#helpModal"><div class="item">Help</div></a>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col">

                <table id="cat_table" class="table data_table">
                    <thead>
                        <tr>
                            <th scope="col">Box Item</th>
                            <th scope="col">Item Level</th>
                            <th scope="col">Added</th>
                            <th scope="col">Last Updated</th>
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
                            <td>{{ $item_label }}</td>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td><span id="updated_val_{{ $item->id }}">{{ $item->updated_at }}</span></td>
                            <td align="right"><button type="button" class="btn table_btn restore_btn" value="{{ $item->id }}">Restore</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    {{-- Help Modal --}}
    <div class="modal fade" id="helpModal" tabindex="-1" role="dialog" aria-labelledby="helpModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content custom_modal">
                <div class="modal-header">
                    <h5 class="modal-title" id="helpModalLabel">Category Box Help</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="section_title">Add a new item</div>
                    <div class="section_info">
                        <ol>
                            <li>In the table below, navigate to the section you want to add an item too.</li>
                            <li>Enter the text in the "Add New Item" field worded as you want.</li>
                            <li>Press Submit</li>
                        </ol>
                        The item should appear in list sorted automatically and active.
                    </div>

                    <div class="section_title">Editing items</div>
                    <div class="section_info">
                        At this time, editing is not permitted.  Entries are logged with the items value and have a general subject to them.  By editing, you run the risk of altering 
                        the subject which can change the previous records accuracy.
                        If you want an item changed, there are 2 options.
                        <ol>
                            <li>Delete the item then create a new one with the changes you want</li>
                            <li>Email an admin which can alter the item</li>
                        </ol>
                    </div>

                    <div class="section_title">Disabling / Removing</div>
                    <div class="section_info">
                        The toggle on the right of each element controls its state.
                        <ul>
                            <li>When the toggle is to the right and showing green, the item is active and available for use.</li>
                            <li>Toggle to the left and grey, the item is disabled and not shown in the live menu.</li>
                        </ul>
                    </div>

                    <div class="section_title">Deleting items</div>
                    <div class="section_info">
                        <p>
                            By pressing the "Delete" button, it will remove the item from the list in both active and disabled states.  This will not actually delete the item 
                            but instead set a flag on it marking it as deleted.
                        </p>
                        <p>To recover a deleted item, click "Trash Bin" from the top submenu and click "Restore".  This will move the item back into your main list.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn modal_btn" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function(){
        // Used to restore the item
        $("#cat_table").on('click', '.restore_btn', function() { /* Using the class since it's in a loop above */
            var id = $(this).val(); /* Gets the value of the item to delete */

            // Sends the change and displays returned message
            $.ajax({
                type: "get",
                url: "{{ url('g1_cat_boxes_restore') }}/"+id,
                success: function(data){
                    // $("#output_message").hide().html(id + ' deleted').fadeIn(400).delay(2000).fadeOut(400); /* DEBUGGING or success message */
                    $("#updated_val_"+id).html(data); /* Sends the new update time to the field */
                }
            });

            // Removes the row
            $(this).closest('tr').remove();
        });
    });
    </script>
@endsection