<?php
// Build the navigation section
if ($type === '1') {
    $data['nav_label'] = "Current level 1 items";
    $data['nav_output'] = 'Current level 1 items';
}elseif ($type === '2') {
    $value = Category_boxes::GetLabel($is_under)->first();
    $data['nav_output'] = '<a href="'.$url.'/'.$type.'/'.$is_under.'">'.$value->cat1_label.'</a>';
}elseif ($type === '3') {
    $lvl2 = Category_boxes::GetLabel($is_under)->first();
    $lvl1 = Category_boxes::GetLabel($lvl2->is_under)->first();
    $lvl1_type = $lvl1->type + 1;
    $data['nav_output'] = '<a href="'.$url.'/'.$lvl1_type.'/'.$lvl1->id.'">'.$lvl1->cat1_label.'</a> &#9679; <a href="'.$url.'/'.$type.'/'.$is_under.'">'.$lvl2->cat2_label.'</a>';
}elseif ($type === '4') {
    $lvl3 = Category_boxes::GetLabel($is_under)->first();
    $lvl2 = Category_boxes::GetLabel($lvl3->is_under)->first();
    $lvl1 = Category_boxes::GetLabel($lvl2->is_under)->first();
    // $data['nav_label'] = $lvl1->cat1_label." &#9679; ".$lvl2->cat2_label." &#9679; ".$lvl3->cat3_label;
    $lvl1_type = $lvl1->type + 1;
    $lvl2_type = $lvl2->type + 1;
    $data['nav_output'] = '<a href="'.$url.'/'.$lvl1_type.'/'.$lvl1->id.'">'.$lvl1->cat1_label.'</a> &#9679; <a href="'.$url.'/'.$lvl2_type.'/'.$lvl2->id.'">'.$lvl2->cat2_label.'</a> &#9679; <a href="'.$url.'/'.$type.'/'.$is_under.'">'.$lvl3->cat3_label.'</a>';
}
?>

<script>
$(document).ready(function(){

});
</script>