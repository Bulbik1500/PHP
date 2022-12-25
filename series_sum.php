<?php
$text = "test";

function series_sum($text)
{
  $len = strlen($text);
  if ($len % 2 != 0) {
    $len = $len / 2;
    $len  = intval($len);
    return $text[$len];
  } else {
    $middle = $len / 2;
    $middleone = $len / 2 - 1;
    return $text[intval($middleone)] . $text[intval($middle)];
  }
}
print(series_sum($text));
