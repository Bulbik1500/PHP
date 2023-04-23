<?php
require_once "Sumator.php";
require_once "Data.php";
//oblicznie skoku po jeden 
function JumpByOne($sumator, $p, $i)
{

    $Yssn = [];
    while ($i < count($sumator)) {
        if ($sumator[$i] >= $p) {
            $Yssn[$i] = 1;
        } else {
            $Yssn[$i] = 0;
        }
        $i++;
    }
    return $Yssn;
}
$Yssn = JumpByOne($Rsumator, $P, $i);

// print_r($Yssn);