<?php
// jezeli sie nie powtarzaja to "(" a jezeli sie powtarzają to ")
$word = "(( @";
$word = strtolower($word);
$word = str_split($word);
$unique = array();
//add to asoc array chars as key, number as values  
$value = 0;
foreach ($word as $char) {
    $unique[$char] = $value;
}
//checking wcit value is repeting.
foreach ($unique as $key => $keyvalue) {
    foreach ($word as $tocheck) {
        if ($key == $tocheck) {
            $unique[$key] = $value++;
        }
    }
    $value = 0;
}
//cheking wich char is repeting and concatenation ),(
$toreturn = "";
foreach ($word as $check) {
    if ($unique[$check] > 0) {
        $toreturn .= ")";
    } else {
        $toreturn .= "(";
    }
}
echo $toreturn;
