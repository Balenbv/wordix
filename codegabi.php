<?php
$coleccionPartidas = [
["palabraWordix"=> "QUESO" , "jugador" => "majo", "intentos"=> 7, "puntaje" => 0],                       //1
["palabraWordix"=> "CASAS" , "jugador" => "rudolf", "intentos"=> 3, "puntaje" => 14],                    //2
["palabraWordix"=> "QUESO" , "jugador" => "pink2000", "intentos"=> 6, "puntaje" => 10],                  //3
["palabraWordix"=> "CASAS" , "jugador" => "cau", "intentos"=> 2, "puntaje" => 11],                       //4
["palabraWordix"=> "PIANO" , "jugador" => "mauro", "intentos"=> 2, "puntaje" => 10],                     //5
["palabraWordix"=> "PISOS" , "jugador" => "gabi", "intentos"=> 4, "puntaje" => 8],                       //6
["palabraWordix"=> "SILLA" , "jugador" => "calemchu", "intentos"=> 7, "puntaje" => 0],                   //7  
["palabraWordix"=> "MELON" , "jugador" => "puchito", "intentos"=> 5, "puntaje" => 9],                    //8
["palabraWordix"=> "LAPIZ" , "jugador" => "calemchu", "intentos"=> 5, "puntaje" => 8],                   //9
["palabraWordix"=> "TINTO" , "jugador" => "cau", "intentos"=> 3, "puntaje" => 9],                        //10
];

function comparacion ($arrayComparativo1, $arrayComparativo2){

    $num = 1; 
    if ($arrayComparativo1["palabraWordix"] == $arrayComparativo2["palabraWordix"]){
        $num = 0;
    } elseif (($arrayComparativo1["jugador"] < $arrayComparativo2["jugador"])) {
        $num = -1;
    }
    return $num;
}

function mostrarColeccionPartida($coleccionPartidas){
    uasort($coleccionPartidas, 'comparacion');
    print_r($coleccionPartidas);
}

mostrarColeccionPartida($coleccionPartidas);


