<?php
require_once "Data.php";
require_once "Sumator.php";

function GetError($i, $Y, $Sumator)
{
    $Error = [];
    while ($i < count($Y)) {
        $Error[$i] =  $Sumator[$i] - $Y[$i];
        $i++;
    }
    return $Error;
}


// print_r(GetError($i, $Y, $Rsumator));

function GetCorretcion($i, $X0, $X1, $X2, $Error, $Eta, $W)
{
    $Dw0 = [];
    $Dw1 = [];
    $Dw2 = [];
    for ($x = 0; $x <= 10; $x++) {
        while ($i < count($Error)) {
            $Dw0[$i] = $Error[$i] * $X0 * $Eta;
            $Dw1[$i] = $Error[$i] * $X1[$i] * $Eta;
            $Dw2[$i] = $Error[$i] * $X2[$i] * $Eta;
            $i++;
        }
        echo "------Genracja $x--------\n";
        for ($y = 0; $y < count($Dw0); $y++) {
            echo "DW0 |" . $Dw0[$y] . "| ";
            echo "DW1 |" . $Dw2[$y] . "| ";
            echo "DW2 |" . $Dw2[$y] . "|\n";
        }

        $Dw0[0] += $W[0];
        $Dw0[1] += $W[1];
        $Dw0[2] += $W[2];


        $i = 0;
    }
}


