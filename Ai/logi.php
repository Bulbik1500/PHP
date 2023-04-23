<?php
require_once "Data.php";
require_once "Sumator.php";
require_once "squreDiff.php";
//licznie logicznego  uczenia sie AI
function LogiYssn($i ,$sumator ,$e){
    $LogiYssn = [];
    while($i < count($sumator)){
        $LogiYssn[] = (($e**$sumator[$i])/(1+$e**$sumator[$i]));
        $i++;
    }
    return $LogiYssn;
}
$logiSqure = squareDif($Y, LogiYssn($i, $Rsumator, $e), $i);