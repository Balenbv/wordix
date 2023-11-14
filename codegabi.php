<?php
function seleccionarOpcion(){
    $opciones = [
        "Jugar al Wordix con una palabra elegida",
        "Jugar al Wordix con una palabra aleatoria",
        "Mostrar una partida",
        "Mostrar la primera partida ganadora",
        "Mostrar resumen de Jugador",
        "Mostrar listado de partidas ordenadas por jugador y por palabra",
        "Agregar una palabra de 5 letras a Wordix",
        "Salir"
    ];
    echo "menu de opciones:"."\n";
    foreach($opciones as $key => $opcion){
        echo ($key + 1). ") " . $opcion."\n";

    }
    do{
        echo "ingrese una opcion(nro):";
        $eleccion = trim(fgets(STDIN));
        if($eleccion < 1 || $eleccion > count($opciones)){
            echo "Opción no válida. pruebe otra opcion"."\n";
        }
    }while($eleccion < 1 || $eleccion > count($opciones));

}

$opcion = seleccionarOpcion();
echo "Has seleccionado la opción " . $opcion . "\n";