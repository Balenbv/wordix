<?php


function cargarColeccionPalabras()
{
    // array $coleccionPalabras
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "LAPIZ", "SILLA", "COCHE", "RADIO", "BOTON"
    ];

    return ($coleccionPalabras);
}


function existePalabraEnColeccion($coleccionPalabrasDondeVerifica , $palabraAVerificar) {
    // int $i
    // boolean $existe
    // Inicializo variable internas a la función.
    $i = 0;
    $existe = false;

    // Busco la palabra en la colección hasta encontrarla o hasta que la colección termine.
    do {
        if ($coleccionPalabrasDondeVerifica[$i] == $palabraAVerificar) {    
            $existe = true;
        }
        $i++;
    } while ($existe == false && count($coleccionPalabrasDondeVerifica) > $i); 
    return $existe;
}



$palabrasDisponibles = cargarColeccionPalabras();

echo "ingrese la palabra:  ";
$palabraNueva = trim(fgets(STDIN));

if (!existePalabraEnColeccion($palabrasDisponibles, $palabraNueva)){
    echo "\nla palabra fue agregada";
}
else {
    echo "\nla palabra ya existia";
}