<?php
$stos = [3, 4, 5, 9, 2];
for (;;) {
    echo "Menu:\n";
    echo "1:Wyswietls stos\n";
    echo "2:Dodaj do stosu\n";
    echo "3:Usun ze stosu\n";
    echo "4:posortuj stos\n";
    echo "5:koniec\n";
    $input = readline("co mam zrobic:");
    switch ($input) {
        case 1:
            if (count($stos) == 0) {
                echo "stos jest pusty";
            } else {
                print_r($stos);
            }
            break;
        case 2:
            $number = readline("co dodać(tylko liczby):");
            array_unshift($stos, $number);
            break;
        case 3:
            array_pop($stos);
            break;
        case 4:
            sort($stos);
            print_r($stos);
            break;
        case 5:
            exit();
            break;
        default:
            echo "nie prawidłowa opcja";
    }
}
