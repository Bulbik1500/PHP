<?php
$n = 56789;
$return = "";
function Rotate($n)
{
    $N = "$n";
    for ($i = 0; $i < strlen($N); $i++) {
            $return[$i] = $N[$i - 1];
        print_r($return);
    }
}
Rotate($n);
