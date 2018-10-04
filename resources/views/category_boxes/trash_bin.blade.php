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

        @if (count($category_items) > '0')
            <div class="row pt-1">
                <div class="col">

                    <table id="cat_table" class="table data_table">
                        <thead>
                            <tr>
                                <th scope="col">Box Item</th>
                                <th scope="col">Item Level</th>
                                <th scope="col">Parent</th>
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
                                <td><span class="output_message">{{ $item_label }}</span></td>
                                <td>{{ $item->type }}</td>
                                <td></td>
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
    @include('category_boxes/help_modal')

    <script>
    $(document).ready(function(){
        // Used to restore the item
        $("#cat_table").on('click', '.restore_btn', function() { /* Using the class since it's in a loop above */
            var id = $(this).val(); /* Gets the value of the item to delete */

            // Sends the change and displays returned message
            $.ajax({
                type: "get",
                url: "{{ url('g1_cat_boxes_edit') }}/"+id+"/false",
            });

            // Removes the row
            $(this).closest('tr').remove();
        });
    });
    </script>
@endsection