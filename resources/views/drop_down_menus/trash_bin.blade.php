@extends('layouts.app')

@section('sidebar')
    @include('group1/sidebar')
@endsection

@section('content')

    <div class="container-fluid nopadding">
        <div class="row submenu">
            <div class="col">
                @include('drop_down_menus/submenu')
            </div>
        </div>

        @if (count($category_items) > '0')
            <div class="row pt-1">
                <div class="col">

                    <table id="cat_table" class="table data_table">
                        <thead>
                            <tr>
                                <th scope="col">Menu Item</th>
                                <th scope="col">Parent Menu</th>
                                <th scope="col">Added</th>
                                <th scope="col">Last Updated</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($category_items as $item)
							
							<?php 
							if ($item->active !== 1){
								$row_state = "disabled_row";
							}else{
								$row_state = "";
							}
							?>

                            <tr id="{{ $item->id }}">
                                <td>{{ $item->menu_text }}</td>
                                <td>{{ $item->dd_parent }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td align="right"><button type="button" class="btn table_btn restore_btn" value="{{ $item->id }}">Restore</button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        @else
            <p class="info_msg">No records found</p>
        @endif

    </div>

    {{-- Help Modal --}}
    @include('drop_down_menus/help_modal')

    <script>
    $(document).ready(function(){
        // Used to restore the item
        $("#cat_table").on('click', '.restore_btn', function() { /* Using the class since it's in a loop above */
            var id = $(this).val(); /* Gets the value of the item to delete */

            // Sends the change and displays returned message
            $.ajax({
                type: "get",
                url: "{{ url('g1_dd_menus_edit') }}/"+id+"/false",
            });

            // Removes the row
            $(this).closest('tr').remove();
        });
    });
    </script>
@endsection