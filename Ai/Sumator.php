<?php
require_once("Data.php");
//------obliczanie sumatoru-------
function Sumator($i, $X1, $X2, $W, $x0)
{
    $sumator = [];
    foreach ($X1 as $xValue) {
        $sumator[$i] = $X1[$i] * $W[1] + $X2[$i] * $W[2] + $x0 * $W[0];
        $i++;
    }
    return $sumator;
}
$Rsumator = Sumator($i, $X1, $X2, $W, $x0);

