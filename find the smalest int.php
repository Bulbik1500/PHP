<?php
$arr = [34, 15, 88, 2];
function Findthesmallest($arr)
{
    $arrlength = count($arr);
    $first = $arr[0];
    for ($i = 0; $i < $arrlength; $i++) {
        if ($first > $arr[$i]) {
            $first = $arr[$i];
            echo $first;
        }
    }
}


Findthesmallest($arr);
