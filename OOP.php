<?php
    class osoba{
        public $wiek;
        public $imie;
        public $id;

    function new($wiek, $imie, $id){
        $this ->imie.readline("Podaj imie: ");
        $this ->wiek.readline("Podaj wiek: ");
        $this ->id = $id;
    }
    function get(){
        $this -> id;
    }    
}
$db = [];

$id = 0 ;
    for(;;){
        echo "Menu:\n";
        echo "1: Dodanie nowej osoby \n";
        echo "2: Wyświetlnanie Data base\n";
        echo "5:koniec\n";
        $userinput = readline("co wykonać: ");
    
    switch($userinput){
        case 1:
            $os.$id = readline("kogo dodać:");
            $os.$id = new osoba();
            $i++;
            break;
    }
    }