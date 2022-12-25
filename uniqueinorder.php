<?php
$iterable = "";
$unique = array();
$i = 0;
if (is_string($iterable)) {
    $iterable = str_split($iterable);
}

$count = count($iterable);
if ($iterable[$i] == "") {
    return [];
} else {
    for ($i = 0; $i < $count - 1; $i++) {
        $x = $iterable[$i + 1];
        if ($iterable[$i] != $x) {
            array_push($unique, $iterable[$i]);
        }
    }
    array_push($unique, $iterable[$count - 1]);
    
}
