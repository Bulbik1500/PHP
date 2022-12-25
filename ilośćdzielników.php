<?php 
    $n = 10;
    function divisors($n){
        $b = 1;
        for($i=1;$i<$n;$i++){
            if($n % $i == 0){
                $b++;
            }
        }
        return $b;
    }

?>