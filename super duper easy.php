<?php
// Make a function that returns the value multiplied by 50 and increased by 6. If the value entered is a string it should return "Error".

function problem($x){
  if(is_string($x) == true){
    $x = "Error";
    return $x;
  }else{
    $x *= 50 + 6;
    return $x;
  }
}

echo problem(1);
