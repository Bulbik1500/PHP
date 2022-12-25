<?php
$lista = [2, 4, 5, 6, 8];
$i = readline("jaki element wyświetlić: \n");
echo "Poprzedni: " . $lista[$i - 1] . "\n";
echo "--->" . $lista[$i] . "\n";
echo "Nastempny: " . $lista[$i + 1] . "\n";
