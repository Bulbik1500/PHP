<?php
$base = 10;
$factor  = 2;
function checkforfaktor($base, $factor)
{
    if ($base % $factor == 0) {
        return "1";
    } else {
        return "0";
    }
}

echo checkforfaktor($base, $factor);
