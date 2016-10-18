<?php
use App\Result;

function cmp($a, $b) {
    if ($a == '') {
        return 1;
    }
    if ($b == '') {
        return -1;
    }
    if ($a == $b) {
        return 0;
    }
    return ($a < $b) ? -1 : 1;
}

function is_result_exist($draw_date,$type){
    
    $result=  Result::where('draw_date','=',date('Y-m-d',  strtotime($draw_date)))
            ->where('type_id','=',$type)
                    ->first();
    if(!isset($result->id)){
        return false;
    }    
    return true;
}
function date_to_mysql($date){
    $arr = explode('/', $date);
    $date = $arr[2].'-'.$arr[0].'-'.$arr[1];
    return $date;
}

function boxed_num($num){
    $box='<button class="btn btn-circle btn-primary">'. $num .'</button>';
    
    echo $box;
}





