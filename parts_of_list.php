<?php

$arr = ["I", "wish", "I", "hadn't", "come"];
function PartsOfList($arr)
{
// create new arrys to oprate on
$aa = $arr;
// create empty arry to fill up with wanted values
$wantedValues = [];
$arryToReturn = [];
$i = 0;
foreach($arr as $item){
    if ($i < count($arr) - 1) {
        array_push($wantedValues, $item);
        $secendimplode = implode(" ", $wantedValues);
        //pushing and imploding value 
        unset($aa[count($arr) - count($arr) + $i]);
        $implodeValue = implode(" ", $aa);
        //deleting and imploding from first to last index 
        array_push($arryToReturn, [$secendimplode, $implodeValue]);
        $i++;
        //adding wanted values to retun array
            } else {
                 break;
                }
    }

return $arryToReturn;

}

print_r(PartsOfList($arr));