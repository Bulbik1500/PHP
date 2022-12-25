<?php
$str = "o a kak a lil vo kashu kakao";
function getCount($str)
{
    $return_value = 0;
    for ($i = 0; $i < strlen($str); $i++) {
        $x = $str[$i];
        // a e i o u 
        switch ($x) {
            case "a":
                $return_value++;
                break;
            case "e":
                $return_value++;
                break;
            case "i":
                $return_value++;
                break;
            case "o":
                $return_value++;
                break;
            case "u":
                $return_value++;
                break;
        }
    }
    return $return_value;
}
print(getCount($str));
