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
 * Obtiene una colección de palabrasDisponibles
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

    return ($coleccionPalabras);
}


/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
/*
    array $palabrasDisponibles
    int   $cantLetrasDeLaPalabra
    array $partidaJugada
    array $datosGenerales
    array $partidasJugadoresGenerales


*/

//Inicialización de variables:
$palabrasDisponibles = cargarColeccionPalabras();
$cantLetrasDePalabraOculta = count($palabrasDisponibles);
$partidaJugada = [];
$datosGenerales = [];
$partidasjugadoresGenerales = [];
//Proceso:




//print_r($partida);                    //siempre fueron comentario, hay que crear una funcion con el nombre imprimirResultado :p
//imprimirResultado($partida); 


do {
echo "\nSeleccione una opción: \n";
echo "1) Jugar al wordix con una palabra elegida\n2) Jugar al wordix con una palabra aleatoria\n3) Mostrar una partida\n4) Mostrar la primer partida ganadora\n5) Mostrar resumen de Jugador\n6) Mostrar listado de partidas ordenadas por jugador y por palabra\n7) Agregar una palabra de 5 letras a Wordix\n8) salir\n";
$opcion = trim(fgets(STDIN));

    switch ($opcion) {
        case 1: 
            //Jugar al wordix con una palabra elegida
            //(Explicado a detalle en asana)
            echo "Ingrese su nombre\n";
            $nombreDelJugador = trim(fgets(STDIN));
            echo "Ingrese el número de palabra que desea jugar:\n";
            $numeroElegido = trim(fgets(STDIN)) - 1;

          
            if (!isset($partidasjugadoresGenerales[$nombreDelJugador])) {
                $partidasjugadoresGenerales[$nombreDelJugador] = [];
            }
            
            if (!in_array($numeroElegido, $partidasjugadoresGenerales[$nombreDelJugador])) {
                if ($numeroElegido >= 0 && $numeroElegido < $cantLetrasDePalabraOculta) {
                    $palabraSecreta = $palabrasDisponibles[$numeroElegido];
                    $partidaJugada = jugarWordix($palabraSecreta, strtolower($nombreDelJugador));
                    array_push($datosGenerales, $partidaJugada);
                    array_push($partidasjugadoresGenerales[$nombreDelJugador], $numeroElegido);
                } else {
                    echo "*************\n****ERROR****\n*************\nIngrese un valor entre 1 y " . $cantLetrasDePalabraOculta . "\n\n";
                }
            } else {
                echo "El número de partida ya ha sido jugado por ".$nombreDelJugador,", por favor elija otro.\n";
            }

        
            break;
        case 2: 
            //Jugar al wordix con una palabra aleatoria
            //(Explicado a detalle en asana)

            echo "Ingrese su nombre\n";
            $nombreDelJugador = trim(fgets(STDIN));
            $palabraSecreta = $palabrasDisponibles[rand(0,$cantLetrasDePalabraOculta)];
            $partidaJugada = jugarWordix($palabraSecreta, strtolower($nombreDelJugador));
            array_push($datosGenerales, $partidaJugada);
            break;

        case 3: 
            //Mostrar una partida
            //(Explicado a detalle en asana)

            $cantidadDePartidas = count($datosGenerales);
            echo "Ingrese el número de partida que desee ver: ";
            $numReview = trim(fgets(STDIN));
            $numReview -= 1;
            if ((($numReview + 1) > 0) && ($numReview < $cantidadDePartidas)){
            $reviewPalabra = $datosGenerales[$numReview]["palabraWordix"];
            $reviewJugador = $datosGenerales[$numReview]["jugador"];
            $reviewIntentos = $datosGenerales[$numReview]["intentos"];
            $reviewPuntaje = $datosGenerales[$numReview]["puntaje"];
            if($reviewPuntaje == 0){           
                echo "\nPartida WORDIX ".($numReview+1),": ".$reviewPalabra,"\nJugador: ".$reviewJugador,"\nPuntaje: ".$reviewPuntaje,"\nIntento: No adivinó la palabra. \n";
            }else{
                echo "\nPartida WORDIX ".($numReview+1),": ".$reviewPalabra,"\nJugador: ".$reviewJugador,"\nPuntaje: ".$reviewPuntaje,"\nIntento: ".$reviewIntentos,"\n";          
            }
            
        }else{
            echo "Número fuera de rango, hasta el momento se jugaron ".$cantidadDePartidas," partidas.";
        }

            break;
        case 4: 
            $victoria = false;
            $numPartida = 1;
          echo "Ingrese el nombre\n";
          $nombreDelJugador = trim(fgets(STDIN));

          foreach($datosGenerales as $partida){
            if ($partida["jugador"] == $nombreDelJugador && $partida["puntaje"] != 0){
                echo "\nPartida WORDIX ".$numPartida.": palabra ".$partida["palabraWordix"] ."\nJugador: ". $partida["jugador"] ."\nCantidad de intentos: ". $partida["intentos"] ."\nPuntaje: ". $partida["puntaje"]."\n";
                $victoria = true;
                break;
            }
            $numPartida++;
          }

          if (!$victoria) {
            echo "\n".$nombreDelJugador." Nunca gano una partida.\n";
    }

            break;
        case 5: 
            //Mostrar resumen de Jugador
            //(Explicado a detalle en asana)

            print_r($datosGenerales);
            break;
        case 6: 
            //Mostrar listado de partidas ordenadas por jugador y por palabra
            //(Explicado a detalle en asana)

            break;
                   
        case 7: 
            //Agregar una palabra de 5 letras a Wordix
            //(Explicado a detalle en asana)

            break;
        case 8: 
            //Salir: Sale del programa.    
    }
    
} while ($opcion != 8);



