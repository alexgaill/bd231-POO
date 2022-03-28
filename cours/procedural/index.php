<?php

// En procédural, on effectue les calculs directement
$numb1 = 4;
$numb2 = 8;
$numb3 = 7;
$numb4 = 23;

echo $numb1 + $numb2;
echo "<br>";
echo $numb3 + $numb4;
// Lors d'une répétition d'opération, 
// on créé une fonction qu'on appel dès que nécessaire
function addition ($nombre1, $nombre2)
{
    return $nombre1 + $nombre2;
}

echo "<br>";
echo addition($numb1, $numb2);
echo "<br>";
echo addition($numb3, $numb4);