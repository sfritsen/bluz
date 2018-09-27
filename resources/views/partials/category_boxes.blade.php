@extends('layouts.app')

@section('sidebar')
    @include('group1/sidebar')
@endsection

@section('content')
    
    <div class="container-fluid nopadding">
        <div class="row">
            <div class="col">

                <div>
                    Current live category box selections available.
                </div>
                
                <div class="form-group">
                    <div class="row">
                        <div class="col-4">
                            <select class="form-control spaced_select" size="6" name="cat_box_1" id="cat_box_1">
                                <option value="" disabled selected hidden>Category 1</option>
                                @foreach($cat_lvl1 as $lvl1)
                                    <option value="{{ $lvl1->id }}" {{(old('cat_box_1') == $lvl1->id?'selected':'')}} >{{ $lvl1->cat1_label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <select class="form-control spaced_select" size="6" name="cat_box_2" id="cat_box_2">
                                <option value="" disabled selected hidden>Category 2</option>
                                @foreach($cat_lvl2 as $lvl2)
                                    <option value="{{ $lvl2->id }}" data-chained="{{ $lvl2->is_under }}" {{(old('cat_box_2') == $lvl2->id?'selected':'')}} >{{ $lvl2->cat2_label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <select class="form-control" size="6" name="cat_box_3" id="cat_box_3">
                                <option value="" disabled selected hidden>Category 3</option>
                                @foreach($cat_lvl3 as $lvl3)
                                    <option value="{{ $lvl3->id }}" data-chained="{{ $lvl3->is_under }}" {{(old('cat_box_3') == $lvl3->id?'selected':'')}} >{{ $lvl3->cat3_label }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <hr>

                <div>
                    New item section information and tips.
                </div>

                <form class="form">
                    <div class="row">
                        <div class="col">

                            <div class="form-group">
                                <input type="text" name="new_item" class="form-control" placeholder="Add New Item" value="{{ old('new_item') }}" aria-describedby="newHelpBlock" required>
                                <small id="newHelpBlock" class="form-text text-muted">
                                    Please ensure your spelling and wording is accurate as this cannot be altered once submitted.
                                </small>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn form_btn">Submit</button>
                            </div>

                        </div>
                    </div>
                </form>

                <hr>

                <div id="cat_data"></div>

            </div>
        </div>
    </div>

    <script>
    $(document).ready(function(){
        // JQuery chain selects
        $(function(){
            $("#cat_box_2").chained("#cat_box_1");
            $("#cat_box_3").chained("#cat_box_2");
        });

        $(function(){
            // Initialize array
            var lvl1_array = [];

            $.ajax({
                type: "get",
                url: "{{ url('g1_cat_boxes_fetch') }}",
                success: function(data){

                    lvl1_array.push('<ul>');

                    // Loop through returned data
                    $.each(data, function () {
                        lvl1_array.push( '<li id="' + this.id + '">' + this.cat1_label + '</li>' );
                    });

                    lvl1_array.push('</ul>');

                    // Displays the array
                    $("#cat_data").html(lvl1_array);

                }
            });
        });
    });
    </script>

@endsection