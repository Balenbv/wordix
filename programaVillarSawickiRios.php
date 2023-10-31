<?php
include_once("wordix.php");



/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github 


Valentin Bustos Villar - Legajo 4019 - mail: valentinbv29@gmail.com - Github: Balenbv
Gabriel Sawicki - Legajo 4894 - mail: gabiswck@gmail.com - Github: GabiSawicki
Mauro Leonel Ríos Merino - Legajo 5073 - mail: riosmerinoml@gmail.com - Github: riosmerinoml


*/

/* ****COMPLETAR***** */


/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * Obtiene una colección de palabras
 * 
 * @return array
 */
function cargarColeccionPalabras()
{
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "LAPIZ", "SILLA", "COCHE", "RADIO", "BOTON"
    ];

    return ($coleccionPalabras[rand(0,19)]);
}

/* ****COMPLETAR***** */



/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:
$numeroRandom = cargarColeccionPalabras();

//Proceso:
echo "Ingrese su nombre\n";
$nombreJugador = trim(fgets(STDIN));

$partida = jugarWordix($numeroRandom, strtolower($nombreJugador));
//print_r($partida);
//imprimirResultado($partida);


do {
echo "Seleccione una opción: \n";
echo "1) Jugar al wordix con una palabra elegida\n2) Jugar al wordix con una palabra aleatoria\n3) Mostrar una partida\n4) Mostrar la primer partida ganadora\n5) Mostrar resumen de Jugador\n6) Mostrar listado de partidas ordenadas por jugador y por palabra\n7) Agregar una palabra de 5 letras a Wordix\n8) salir\n";
$opcion = trim(fgets(STDIN));

    switch ($opcion) {
        case 1: 
            echo "\nelegiste la opcion 1";

            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2

            break;
        case 3: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        case 4: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 4

            break;
        case 5: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 5

            break;
        case 6: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 6

            break;
                   
        case 7: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 7

            break;
        case 8: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 8    
    }
    
} while ($opcion != 8);



