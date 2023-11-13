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
 * Función 1:
 * La función inicializa una estructura de datos con ejemplos de palabras de cinco letras en mayúsculas y
 * retorna esta misma colección.
 * 
 * @return array
 */
function cargarColeccionPalabras() {
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
 * Función 2
 * La función inicializa una estructura de datos con partidas jugadas.
 * 
 * @return array
 * 
 */
function cargarPartidas() {
    // array $coleccionPartidas
    $coleccionPartidas = [
        ["palabraWordix"=> "QUESO" , "jugador" => "majo", "intentos"=> 7, "puntaje" => 0], 
        ["palabraWordix"=> "CASAS" , "jugador" => "rudolf", "intentos"=> 3, "puntaje" => 14],                    
        ["palabraWordix"=> "QUESO" , "jugador" => "pink2000", "intentos"=> 6, "puntaje" => 10],                  
        ["palabraWordix"=> "CASAS" , "jugador" => "cau", "intentos"=> 2, "puntaje" => 11],                       
        ["palabraWordix"=> "PIANO" , "jugador" => "mauro", "intentos"=> 2, "puntaje" => 10],                     
        ["palabraWordix"=> "PISOS" , "jugador" => "gabi", "intentos"=> 4, "puntaje" => 8],                       
        ["palabraWordix"=> "SILLA" , "jugador" => "valentin", "intentos"=> 7, "puntaje" => 0],                   
        ["palabraWordix"=> "MELON" , "jugador" => "valentin", "intentos"=> 5, "puntaje" => 9],                    
        ["palabraWordix"=> "LAPIZ" , "jugador" => "calemchu", "intentos"=> 5, "puntaje" => 8],                   
        ["palabraWordix"=> "TINTO" , "jugador" => "valentin", "intentos"=> 3, "puntaje" => 9],                        
    ];
    return $coleccionPartidas;
}

/**
 * La función inicializa una estructura de datos con los resúmenes de jugadores.
 * 
 * @return array
 */
function cargarResumenesJugadores() {
    // array $resumenesJugadores
    $resumenesJugadores = [
        ["jugador" => "majo" , "partidas" => 1 , "puntajeTotal" => 0 , "victorias" => 0 , 
        "intento1" => 0 , "intento2" => 0 , "intento3" => 0 , "intento4" => 0 , "intento5" => 0 , "intento6" => 0],

        ["jugador" => "rudolf" , "partidas" => 1 , "puntajeTotal" => 14 , "victorias" => 1 , 
        "intento1" => 0 , "intento2" => 0 , "intento3" => 1 , "intento4" => 0 , "intento5" => 0 , "intento6" => 0],

        ["jugador" => "pink2000" , "partidas" => 1 , "puntajeTotal" => 10 , "victorias" => 1 , 
        "intento1" => 0 , "intento2" => 0 , "intento3" => 0 , "intento4" => 0 , "intento5" => 0 , "intento6" => 1],

        ["jugador" => "cau" , "partidas" => 1 , "puntajeTotal" => 11 , "victorias" => 1 , 
        "intento1" => 0 , "intento2" => 1 , "intento3" => 0 , "intento4" => 0 , "intento5" => 0 , "intento6" => 0],

        ["jugador" => "mauro" , "partidas" => 1 , "puntajeTotal" => 10 , "victorias" => 1 , 
        "intento1" => 0 , "intento2" => 1 , "intento3" => 0 , "intento4" => 0 , "intento5" => 0 , "intento6" => 0],

        ["jugador" => "gabi" , "partidas" => 1 , "puntajeTotal" => 8 , "victorias" => 1 , 
        "intento1" => 0 , "intento2" => 0 , "intento3" => 0 , "intento4" => 1 , "intento5" => 0 , "intento6" => 0],

        ["jugador" => "valentin" , "partidas" => 3 , "puntajeTotal" => 19 , "victorias" => 2 , 
        "intento1" => 0 , "intento2" => 0 , "intento3" => 1 , "intento4" => 0 , "intento5" => 1 , "intento6" => 0],

        ["jugador" => "calemchu" , "partidas" => 1 , "puntajeTotal" => 8 , "victorias" => 1 , 
        "intento1" => 0 , "intento2" => 0 , "intento3" => 0 , "intento4" => 0 , "intento5" => 1 , "intento6" => 0],
    ];
    return $resumenesJugadores;
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
$coleccionPartidas = cargarPartidas();
$jugadores = cargarResumenesJugadores();

$cantPalabrasDisponibles = count($palabrasDisponibles);
$partidaJugada = [];
//Partidas pre-cargadas
$partidasjugadoresGenerales = ["majo"=> [1],"rudolf"=> [3],"pink2000" => [1],"cau"=> [3,8],"mauro"=> [13],"gabi"=> [14],"calemchu"=> [16,15],"puchito"=> [11]];


//Proceso:

//print_r($partida);                    
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
            $numeroElegido = trim(fgets(STDIN));
            $numeroElegido -= 1;          
            $partidaRepetida = false;
            
            //Checkea que el número ingresado este dentro del rango.
            if ($numeroElegido >= 0 && $numeroElegido < $cantPalabrasDisponibles) {

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
                echo "*************\n****ERROR****\n*************\nIngrese un valor entre 1 y " . $cantPalabrasDisponibles . "\n\n";
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
                if ($numeroDePartidas == $cantPalabrasDisponibles) {
                    break;
                }
                $numeroAleatorio = rand(0, ($cantPalabrasDisponibles -1));
                $partidaRepetida = false;
                foreach ($partidasjugadoresGenerales[$nombreDelJugador] as $numero) {
                    if ($numero == $numeroAleatorio) {
                        $partidaRepetida = true;
                        break;
                    }
                }
            } while ($partidaRepetida);
            //En caso de haber jugado todas las palabras posibles, dar un mensaje de error.
            if ($numeroDePartidas == $cantPalabrasDisponibles) {
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
            $victoria = false;
            $numPartida = 1;
            $stopCiclos = 1;
          echo "Ingrese el nombre\n";
          $nombreDelJugador = trim(fgets(STDIN));

          foreach($coleccionPartidas as $partida){
            if ($partida["jugador"] == $nombreDelJugador && $partida["puntaje"] != 0 && $stopCiclos == 1){
                echo "\nPartida WORDIX ".$numPartida.": palabra ".$partida["palabraWordix"] ."\nJugador: ". $partida["jugador"] ."\nCantidad de intentos: ". $partida["intentos"] ."\nPuntaje: ". $partida["puntaje"]."\n";
                $victoria = true;
                $stopCiclos++;
                break;
            }
            $numPartida++;
          }

          if (!$victoria) {
            echo "\n".$nombreDelJugador." Nunca gano una partida.\n";
    }

            break;

        case 5:
            $partidasQueJugo = 0;
            $puntajeTotalJugador = 0;
            $contIntentos1 =0;
            $contIntentos2 =0;
            $contIntentos3 =0;
            $contIntentos4 =0;
            $contIntentos5 =0;
            $contIntentos6 =0;
            $porcentajeDeVictoria = 0;
            echo "ingrese el nombre del jugador a buscar: \n";
                $nombreDelJugador = trim(fgets(STDIN));

                foreach ($coleccionPartidas as $estadiscticasJugador){
                    if ($estadiscticasJugador["jugador"] == $nombreDelJugador ) {
                        $partidasQueJugo++;
                        $puntajeTotalJugador += $estadiscticasJugador["puntaje"];

                        if($estadiscticasJugador["intentos"] == 1){
                            $contIntentos1++;
                        }
                        else if ($estadiscticasJugador["intentos"] == 2){
                            $contIntentos2++;
                        }
                        else if ($estadiscticasJugador["intentos"] == 3){
                            $contIntentos3++;
                        }
                        else if($estadiscticasJugador["intentos"] == 4){
                            $contIntentos4++;
                        }
                        else if($estadiscticasJugador["intentos"] == 5){
                            $contIntentos5++;
                        }
                        else if($estadiscticasJugador["intentos"] == 6){
                            $contIntentos6++;
                        }
                    }
                }
                $cantPartidasGanadasJugador = $contIntentos1 + $contIntentos2 + $contIntentos3 + $contIntentos4 + $contIntentos5 + $contIntentos6;
                echo "\n".$partidasQueJugo. "     ". $cantPartidasGanadasJugador."\n";
                $porcentajeDeVictoria = ($cantPartidasGanadasJugador / $partidasQueJugo)*100;

                echo "\nJugador: ".$nombreDelJugador."\nPartidas: ".$partidasQueJugo."\nPuntaje Total: ".$puntajeTotalJugador."\nVictorias: ". $porcentajeDeVictoria."%\nAdivinadas: ";
                echo "\nIntento 1: ".$contIntentos1.
                    "\nIntento 2: ".$contIntentos2.
                    "\nIntento 3: ".$contIntentos3.
                    "\nIntento 4: ".$contIntentos4.
                    "\nIntento 5: ".$contIntentos5.
                    "\nIntento 6: ".$contIntentos6. "\n";



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
            $cantPalabrasDisponibles = count($palabrasDisponibles);
            echo "\nLa palabra fue agregada de manera exitosa.\n";

            break;
        case 8: 
            //Salir: Sale del programa.
            echo "Gracias por jugar Wordix, vuelva pronto!";    
    }
    
} while ($opcion != 8);