<?php 
// jezeli sie nie powtarzaja to "(" a jezeli sie powtarzają to ")
$word = "din";
$word = strtolower($word);
$word = str_split($word);
$count = count($word);
$unique = [];

    for ($i = 0; $i < $count - 1; $i++) {
        $x = $word[$i + 1];
        if ($word[$i] != $x) {
            array_push($unique, $word[$i]);
        }
    }
    array_push($unique, $word[$count - 1]);
    print_r($unique);
