@extends('layouts.app')

@section('sidebar')
    @include('group1/sidebar')
@endsection

@section('content')
    
    <div class="container-fluid nopadding">
        <div class="row">
            <div class="col">

                <div>
                    Section sub menu
                </div>
                
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4">
                                <select class="form-control spaced_select" size="8" name="cat_box_1" id="cat_box_1">
                                    <option value="" disabled selected hidden>Category 1</option>
                                    @foreach($cat_lvl1 as $lvl1)
                                        <option value="{{ $lvl1->id }}" {{(old('cat_box_1') == $lvl1->id?'selected':'')}} >{{ $lvl1->cat1_label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <select class="form-control spaced_select" size="8" name="cat_box_2" id="cat_box_2">
                                    <option value="" disabled selected hidden>Category 2</option>
                                    @foreach($cat_lvl2 as $lvl2)
                                        <option value="{{ $lvl2->id }}" data-chained="{{ $lvl2->is_under }}" {{(old('cat_box_2') == $lvl2->id?'selected':'')}} >{{ $lvl2->cat2_label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <select class="form-control" size="8" name="cat_box_3" id="cat_box_3">
                                    <option value="" disabled selected hidden>Category 3</option>
                                    @foreach($cat_lvl3 as $lvl3)
                                        <option value="{{ $lvl3->id }}" data-chained="{{ $lvl3->is_under }}" {{(old('cat_box_3') == $lvl3->id?'selected':'')}} >{{ $lvl3->cat3_label }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

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
    });
    </script>

@endsection