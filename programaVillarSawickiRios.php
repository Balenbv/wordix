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
function opcionElegida(){
    $TotalOpciones = [
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
    foreach($TotalOpciones as $key => $opcionParticular){
        echo ($key + 1). ") " . $opcionParticular."\n";

    }
    do{
        echo "ingrese una opcion(nro):";
        $eleccion = trim(fgets(STDIN));
        if($eleccion < 1 || $eleccion > count($TotalOpciones)){
            echo "Opción no válida. pruebe otra opcion"."\n";
        }
    }while($eleccion < 1 || $eleccion > count($TotalOpciones));

    return $eleccion;
}


function elNombeExiste($nombresCargados, $nuevoNombre){

    foreach($nombresCargados as $nombre) {
        if ($nombre["jugador"] == $nuevoNombre) {
            
            return true;
        }
    }
    echo "\nel jugador no esta registrado\n";
    return false;
}




/**
 * Obtiene una colección de palabrasDisponibles
 * 
 * Función 1:
 * La función inicializa una estructura de datos con ejemplos de palabras de cinco letras en mayúsculas y
 * retorna esta misma colección.
 * 
 * @return array
 */
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

/**
 * Función 4:
 * La función le pide al usuario una plabra de 5 letras y, luego de verificar que lo sea, la retorna en mayusculas.
 * 
 * @return string
 * 
 */

 function solicitarPalabraDeCincoLetras() {
    echo "\n";
    echo "Ingrese una palabra de 5 letras: ";
    $palabraDeCincoLetras = trim(fgets(STDIN));
    $cantLetras = strlen($palabraDeCincoLetras);
    while(!esPalabra($palabraDeCincoLetras) || $cantLetras != 5) {
        echo "\n";
        echo "Inténtelo nuevamente.\n";
        echo "Ingrese una palabra de 5 letras: ";
        $palabraDeCincoLetras = trim(fgets(STDIN));
        $cantLetras = strlen($palabraDeCincoLetras);
    }
    $palabraDeCincoLetras = strtoupper($palabraDeCincoLetras);
    return $palabraDeCincoLetras;

    
}
/**
 * funcion case 4
 * 
 */
function primeraVictoria($partidas,$jugador){
$victoria = false;
$numPartida = 1;
$stopCiclos = 1;
    foreach($partidas as $partida){
        if ($partida["jugador"] == $jugador && $partida["puntaje"] != 0 && $stopCiclos == 1){
            echo  "\n**************************************"."\nPartida WORDIX ".$numPartida.": palabra ".$partida["palabraWordix"] ."\nJugador: ". $partida["jugador"] ."\nCantidad de intentos: ". $partida["intentos"] ."\nPuntaje: ". $partida["puntaje"]. "\n**************************************\n";
            $victoria = true;
            $stopCiclos++;
            break;
        }
        $numPartida++;
      }

      if (!$victoria) {
        echo "\n".$jugador." Nunca gano una partida.\n";
}

}






/**
 * funcion case 5
 * 
 */

function recopilarEstadisticasJugador($partidas, $jugador){
    $resumenJugador = [];
    $partidasQueJugo = 0;
    $puntajeTotalJugador = 0;
    $contIntentos1 = 0;
    $contIntentos2 = 0;
    $contIntentos3 = 0;
    $contIntentos4 = 0;
    $contIntentos5 = 0;
    $contIntentos6 = 0;
    $porcentajeDeVictoria = 0;
        if (elNombeExiste($partidas, $jugador)){

            foreach ($partidas as $estadisticasJugador){
                if ($estadisticasJugador["jugador"] == $jugador ) {
                    $partidasQueJugo++;
                    $puntajeTotalJugador += $estadisticasJugador["puntaje"];

                    switch($estadisticasJugador["intentos"]){
                        case 1 : $contIntentos1++; break;
                        case 2 : $contIntentos2++; break;
                        case 3 : $contIntentos3++; break;
                        case 4 : $contIntentos4++; break;
                        case 5 : $contIntentos5++; break;
                        case 6 : $contIntentos6++; break;
                        default : break;
                    }

                }
            }
            $cantVictorias = $contIntentos1 + $contIntentos2 + $contIntentos3 + $contIntentos4 + $contIntentos5 + $contIntentos6;

            $resumenJugador = ["jugador" => $jugador, "partidas" => $partidasQueJugo, "puntajeTotal" => $puntajeTotalJugador, "victorias" => $cantVictorias, "intento1" => $contIntentos1, "intento2" => $contIntentos2, "intento3" => $contIntentos3, "intento4" => $contIntentos4, "intento5" => $contIntentos5, "intento6" =>$contIntentos6];
        
    }
 
    return $resumenJugador;

    }




/**
 * Funcion case 6:
 * Esta funcion agarra 2 arrays asociativos y los compara para determinar cual es nombre del jugador alfabeticamente menor, en caso de ser iguales compara sus palabras jugadas
 * @param array $array1
 * @param array $array2
 * @return int
 */
function miComparacion($array1, $array2){
    $comparacionNombreJugador = strcmp ($array1["jugador"], $array2["jugador"]);
    $comparacionPalabraJugada = strcmp($array1["palabraWordix"], $array2["palabraWordix"]);
        if ($comparacionNombreJugador != 0){
            return $comparacionNombreJugador;
        } else {
            return $comparacionPalabraJugada;
        }
}


/**
 * Función 7:
 * La función tiene como entrada una colección de palabras y una palabra para retornar la primera con la palabra agregada.
 * 
 * @param array $coleccionPalabrasAAgregar
 * @param string $palabra
 * @return array $coleccionPalabrasAAgregar
 * 
 */

 function agregarPalabra($coleccionPalabrasAAgregar , $palabra) {
    //int $cantPalabras
    $cantPalabras = count($coleccionPalabrasAAgregar);
    $coleccionPalabrasAAgregar[$cantPalabras] = $palabra;
    return $coleccionPalabrasAAgregar;
 }


/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
/*
    array $palabrasDisponibles
    int   $cantLetrasDeLaPalabra
    array $partidaJugada
    array $coleccionPartidas
    array $partidasJugadoresGenerales

*/

//Inicialización de variables:
$palabrasDisponibles = cargarColeccionPalabras();
$cantLetrasDePalabraOculta = count($palabrasDisponibles);
$partidaJugada = [];
$estadisticasJugador =[];
//Partidas pre-cargadas
$partidasjugadoresGenerales = ["majo"=> [1],"rudolf"=> [3],"pink2000" => [1],"cau"=> [3,8],"mauro"=> [13],"gabi"=> [14],"calemchu"=> [16,15],"puchito"=> [11]];
$coleccionPartidas = [["palabraWordix"=> "QUESO" , "jugador" => "majo", "intentos"=> 7, "puntaje" => 0], //1
["palabraWordix"=> "CASAS" , "jugador" => "rudolf", "intentos"=> 3, "puntaje" => 14],                    //2
["palabraWordix"=> "QUESO" , "jugador" => "pink2000", "intentos"=> 6, "puntaje" => 10],                  //3
["palabraWordix"=> "CASAS" , "jugador" => "cau", "intentos"=> 2, "puntaje" => 11],                       //4
["palabraWordix"=> "PIANO" , "jugador" => "mauro", "intentos"=> 2, "puntaje" => 10],                     //5
["palabraWordix"=> "PISOS" , "jugador" => "gabi", "intentos"=> 4, "puntaje" => 8],                       //6
["palabraWordix"=> "SILLA" , "jugador" => "valentin", "intentos"=> 7, "puntaje" => 0],                   //7  
["palabraWordix"=> "MELON" , "jugador" => "valentin", "intentos"=> 5, "puntaje" => 9],                   //8
["palabraWordix"=> "LAPIZ" , "jugador" => "calemchu", "intentos"=> 5, "puntaje" => 8],                   //9
["palabraWordix"=> "TINTO" , "jugador" => "valentin", "intentos"=> 3, "puntaje" => 9],                   //10
];

$opcion = opcionElegida();

switch ($opcion) {
        case 1:          
            //Jugar al wordix con una palabra elegida
            //(Explicado a detalle en asana)

            echo "Ingrese su nombre\n";
            $nombreDelJugador = trim(fgets(STDIN));
            echo "Ingrese el número de palabra que desea jugar:\n";
            $numeroElegido = trim(fgets(STDIN));
            $numeroElegido -= 1;          
            $partidaRepetida = false;
            
            //Checkea que el número ingresado este dentro del rango.
            if ($numeroElegido >= 0 && $numeroElegido < $cantLetrasDePalabraOculta) {

                //Checkea si el array del jugador está creado, si no lo está, lo crea.
                if (!isset($partidasjugadoresGenerales[$nombreDelJugador])) {
                    $partidasjugadoresGenerales[$nombreDelJugador] = [];
                }

                //Revisa en todo el array si la palabra coincide con el número elejido.         
                foreach ($partidasjugadoresGenerales[$nombreDelJugador] as $numero) {
                    if ($numero == $numeroElegido) {
                        $partidaRepetida = true;
                        break;
                    }
                }
                
                //Si el número no coincide se juega la partida, si coincide sale un mensaje de error. 
                if (!$partidaRepetida) {
                    $palabraSecreta = $palabrasDisponibles[$numeroElegido];
                    $partidaJugada = jugarWordix($palabraSecreta, strtolower($nombreDelJugador));
                    array_push($coleccionPartidas, $partidaJugada);
                    array_push($partidasjugadoresGenerales[$nombreDelJugador], $numeroElegido);
                } else {
                    echo "El número de partida ya ha sido jugado por " . $nombreDelJugador . ", por favor elija otro.\n";
                }
            } else {
                echo "*************\n****ERROR****\n*************\nIngrese un valor entre 1 y " . $cantLetrasDePalabraOculta . "\n\n";
            }  

            break;

        case 2: 
            //Jugar al wordix con una palabra aleatoria
            //(Explicado a detalle en asana)

            echo "Ingrese su nombre\n";
            $nombreDelJugador = trim(fgets(STDIN));
            
            $partidaRepetida = false;
             //Checkea si el array del jugador está creado, si no lo está, lo crea.
             if (!isset($partidasjugadoresGenerales[$nombreDelJugador])) {
                $partidasjugadoresGenerales[$nombreDelJugador] = [];
            } 
            $numeroDePartidas = count($partidasjugadoresGenerales[$nombreDelJugador]);   
            //Realiza un bucle de palabras aleatorias para asegurarse que no se repitan.
            do {
                if ($numeroDePartidas == $cantLetrasDePalabraOculta) {
                    break;
                }
                $numeroAleatorio = rand(0, ($cantLetrasDePalabraOculta -1));
                $partidaRepetida = false;
                foreach ($partidasjugadoresGenerales[$nombreDelJugador] as $numero) {
                    if ($numero == $numeroAleatorio) {
                        $partidaRepetida = true;
                        break;
                    }
                }
            } while ($partidaRepetida);
            //En caso de haber jugado todas las palabras posibles, dar un mensaje de error.
            if ($numeroDePartidas == $cantLetrasDePalabraOculta) {
                echo "Usted ya jugó todas las palabras disponibles, por favor, agregue más.";
                break;
            }
            $palabraSecreta = $palabrasDisponibles[$numeroAleatorio];
            $partidaJugada = jugarWordix($palabraSecreta, strtolower($nombreDelJugador));
            array_push($coleccionPartidas, $partidaJugada);
            array_push($partidasjugadoresGenerales[$nombreDelJugador], $numeroAleatorio);
            break;


        case 3: 
            //Mostrar una partida
            //(Explicado a detalle en asana)

            $cantidadDePartidas = count($coleccionPartidas);
            echo "Ingrese el número de partida que desee ver: ";
            $numReview = trim(fgets(STDIN));
            $numReview -= 1;
            if ((($numReview + 1) > 0) && ($numReview < $cantidadDePartidas)){
            $reviewPalabra = $coleccionPartidas[$numReview]["palabraWordix"];
            $reviewJugador = $coleccionPartidas[$numReview]["jugador"];
            $reviewIntentos = $coleccionPartidas[$numReview]["intentos"];
            $reviewPuntaje = $coleccionPartidas[$numReview]["puntaje"];
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

          echo "Ingrese el nombre\n";
          $nombreDelJugador = trim(fgets(STDIN));

          primeraVictoria($coleccionPartidas, $nombreDelJugador);

            break;

        case 5:

            echo "Ingrese su nombre\n";
            $nombreDelJugador = trim(fgets(STDIN));
            $estadisticasJugador = recopilarEstadisticasJugador($coleccionPartidas,$nombreDelJugador);


            echo "\n**************************************\n";
            echo "Jugador: ".$estadisticasJugador["jugador"];
            echo "\nPartidas: ". $estadisticasJugador["partidas"];
            echo "\nPuntaje total: ". $estadisticasJugador["puntajeTotal"];
            echo "\nVictorias: ". $estadisticasJugador["victorias"];
            echo "\nPorcentaje Victorias: " . floor(($estadisticasJugador["victorias"] / $estadisticasJugador["partidas"]) * 100)."%";
            echo "\nadivinadas".
            "\n    intento 1: ". $estadisticasJugador["intento1"].
            "\n    intento 2: ". $estadisticasJugador["intento2"].
            "\n    intento 3: ". $estadisticasJugador["intento3"].
            "\n    intento 4: ". $estadisticasJugador["intento4"].
            "\n    intento 5: ". $estadisticasJugador["intento5"].
            "\n    intento 6: ". $estadisticasJugador["intento6"];
            echo "\n**************************************\n";


            break;

        case 6: 
            uasort($coleccionPartidas, 'miComparacion');

            print_r($coleccionPartidas);
            break;

        case 7: 
            //Agregar una palabra de 5 letras a Wordix utilizando las funciones 4 y 7.
            
            //Solicita la nueva palabra que se agregará.
            $palabraAAgregar = solicitarPalabraDeCincoLetras();
            

            //Agrega la palabra a la coleccón.
            $palabrasDisponibles = agregarPalabra($palabrasDisponibles , $palabraAAgregar);
            $cantLetrasDePalabraOculta = count($palabrasDisponibles);
            echo "\nLa palabra fue agregada de manera exitosa.\n";
            break;

        case 8: 
            //Salir: Sale del programa.
            echo "Gracias por jugar Wordix, vuelva pronto!";    
}