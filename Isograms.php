<?php
$string = "isIsogram";


function isIsogram($string)
{
    if (strlen($string) == 0) {
        return true;
    } else {

        $i = 0;
        $string = mb_convert_case($string, MB_CASE_LOWER);
        $arrayString =  $string = str_split($string);
        sort($arrayString);

        foreach ($arrayString as $x) {
            if (($i + 1) == count($arrayString)) {
                return true;
            } else {
                if ($x == $arrayString[$i + 1]) {
                    return false;
                    break;
                } else {
                    $i++;
                }
            }
        }
    }
}


print_r(isIsogram($string));
