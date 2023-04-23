<?php
require_once "Data.php";
require_once "JumpByOne.php";
//funkcjia to obliczenia kwadratu róznicy
 function squareDif($Y, $Yssn, $i)
 {
     $squerDiff = [];
     while ($i < count($Y)) {
         $squerDiff[$i] = ($Y[$i] - $Yssn[$i]) ** 2;
         $i++;
     }
     return $squerDiff;
 }


