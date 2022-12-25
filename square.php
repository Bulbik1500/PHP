<?php
$num = 9119;
function num_digits($num)
{
    $num = (string) $num;
    $leng = strlen($num);
    $Rstring = ""; 
    for($i = 0;$i <= $leng - 1;$i++ ){
        (int)$val = $num[$i];
        $val = $val**2;
        (string) $Rstring .= $val;
    }
    return (int)$Rstring;
}

var_dump(num_digits($num));
