<?php
for (;;) {
    $arr = ["z", 1, 14, 24, 12, 3, 4, 2, "z"];
    $Arr = [1, 14, 24, 12, 3, 4, 2, "z"];

    echo "------MENU-------\n";
    echo "1.Wyszukiwanie liniowe\n";
    echo "2.Wyszukiwania liniowego dowolnych danych wraz zwartownikiem\n";
    echo "3.Wyszukiwania binarnego dowolnych danych\n";
    echo "4.Porównanie czasów\n";
    echo "5.Implementacja listy dwukierunkowej wraz z funkcją usuwania dowolnej pozycji.\n";
    echo "6.koniec programu\n";
    echo "------MENU-------\n";


    $usermenu = readline("Podaj numer opcji którą chcesz wykonać: ");

    switch ($usermenu) {
        case 1:
            $i = 0;
            $userinput = readline("jaką liczbe mam znaleść: ");
            $arrc = count($arr);
            while ($i < $arrc - 1) {
                if ($userinput == $arr[$i]) {
                    echo "twój wybór jest na pozycji " . $i . "\n";
                    exit();
                } else {
                    echo "na pozycji " . $i . " nie znaleziono twojej liczby\n";
                }
                $i++;
            }
            break;
        case 2:
            $i = 0;
            $userinput = readline("Jaką liczbe mam znaleść: ");
            foreach ($Arr as $valu) {
                if ($userinput == $valu) {
                    echo "Twój wybór jest na pozycji " . $i . "\n";
                    exit();
                } elseif ("z" == $valu) {
                    echo "Nie znaleziono twojej liczby \n";
                }
                $i++;
            }
            break;
        case 3:
            sort($arr);
            $arrc = count($arr);
            $f = 0;
            $m = round($arrc / 2);
            $i = $m;

            $userinput = readline("Jaką liczbe mam znaleść: ");

            while ($i < $arrc - 1) {
                if ($userinput > $arr[$m]) {
                    $m++;
                } else {
                    $m--;
                }
                if ($userinput == $arr[$m]) {
                    echo "twoja liczba jest na " . $i;
                    exit();
                } elseif ($arr[$m] == "z") {
                    echo "Nie znalezionio twojej liczby";
                }

                $i++;
            }
            break;
        case 4:
            $userinput = 24;
            $Atime = microtime(true);
            $i = 0;
            $arrc = count($arr);
            while ($i < $arrc - 1) {
                if ($userinput == $arr[$i]) {
                    $Atime_stop = microtime(true);
                    $A = $Atime_stop - $Atime;
                    echo  $A . "  -->bez wartownika\n";
                }
                $i++;
            }
            // ----------------------------------------------------------
            $Btime = microtime(true);
            sort($arr);
            $arrc = count($arr);
            $f = 0;
            $m = round($arrc / 2);
            $i = $m;


            while ($i < $arrc - 1) {
                if ($userinput > $arr[$m]) {
                    $m++;
                } else {
                    $m--;
                }
                if ($userinput == $arr[$m]) {
                    $Btime_stop = microtime(true);
                    $B =  $Btime_stop - $Btime;
                    echo  $B . " -->binarny \n";
                } elseif ($arr[$m] == "z") {
                    $Btime_stop = microtime(true);
                    $B =  $Btime_stop - $Btime;
                    echo  $B . " -->binarny \n";
                }

                $i++;
                // ----------------------------------------------------
                $Ctime = microtime(true);
                $i = 0;
                foreach ($Arr as $valu) {
                    if ("z" != $valu) {
                        $Ctime_stop = microtime(true);
                        $C =  $Ctime_stop;
                        -$Ctime;
                        echo $C . " --> z wartownikem \n";
                        exit();
                    }
                    // } elseif ("z" == $valu) {
                    //     $Ctime_stop = microtime(true);
                    //     $C =  $Ctime_stop;
                    //     -$Ctime;
                    //     echo $C . " --> z wartownikem \n";
                    // }
                    $i++;
                }
            }
            break;
        case 5:
            for (;;) {

                $userinput = readline("Podaj który element listy: ");
                if ($userinput == 0) {
                    echo $arr[$userinput] . "," . $arr[$userinput + 1] . "\n";
                } elseif ($userinput == (count($arr) - 1)) {
                    echo $arr[$userinput - 1] . "," . $arr[$userinput] . "\n";
                } else {
                    echo $arr[$userinput - 1] . "," . $arr[$userinput] . "," . $arr[$userinput + 1] . "\n";
                }
                $y = readline("usunąc dany elemnt Y/N:");
                if ($y == "Y" || $y == "y") {
                   
                    unset($arr[$userinput]);   
                    $arr = array_values($arr);  

                }
            }
            break;
        case 6:
            exit();
            break;
        default:
            echo "wybrano złą opcje";
            break;
    }
}
