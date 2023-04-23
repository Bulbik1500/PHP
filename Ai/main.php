<?php
/* 
Zadanie polega zaprezentowac w kodzie exala jak sie uczy AI.
*/
require_once "Sumator.php";
require_once "squreDiff.php";
require_once "DuzaT.php";
require_once "logi.php";
//-----mała tablea----//
function NiceEcho($x, $name)
{
    echo $name;
    foreach ($x as $value) {
        echo "  $value |";
    }
    echo "\n";
}
//wywołanie wszystkich funkcji obliczających 
$squerDiffJumpByOne = squareDif($Y, $Yssn, $i);
$squerDiffLine = squareDif($Y, $Rsumator, $i);
$logi = LogiYssn($i, $Rsumator, $e);

NiceEcho($Rsumator, "sumator");
echo "\n";
//---skok o jeden---//
NiceEcho($squerDiffJumpByOne, "skok o jeden");
echo "Kwadrat róznicy skoku o jeden: " . array_sum($squerDiffJumpByOne) . "\n";
//---Liniowa---//
NiceEcho($squerDiffLine, "Liniowa");
echo "Kwadrat różnicy liniwej : " . array_sum($squerDiffLine) . "\n";
#---logistyczna----
NiceEcho($logi, "logistyczna");
echo "Kwadrat róznicy logistycznej: " . array_sum($logiSqure) . "\n";
//-----mała tablea----//
echo "\n\n";

GetCorretcion($i, $x0, $X1, $X2, GetError($i, $Y, $Rsumator), $eta, $W,);
