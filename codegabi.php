<?php
$arrayMayor = [];

for($i=0; $i < 3; $i++){
    echo "nombre";
    $nom = trim(fgets(STDIN));
$arrayTest1 = ["palabra" => "mujer", "jugador" => $nom , "intentos" => $i*10, "puntaje" => $i*-10];

array_push($arrayMayor, $arrayTest1);
}

echo $arrayMayor[2]["jugador"];
