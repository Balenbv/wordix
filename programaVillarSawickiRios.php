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
 * funcion que evalua que un nombre exita dentro de una coleccion de nombres o si es nuevo
 * @return boolean
 */
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
 * Funcion 2:
 * una funcion que donde se guardan las partidas jugadas.
 * @return array
 */
function cargarPartidas(){
    $coleccionPartidas = [["palabraWordix"=> "QUESO" , "jugador" => "majo", "intentos"=> 7, "puntaje" => 0], 
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
 * funcion 3:
 * muestra un menu de opciones y evalua que el valor este dentro de un rango
 * @return int Es un numero valido de opcion
 */

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
    echo "Menú de opciones:"."\n";
    foreach($TotalOpciones as $key => $opcionParticular){
        echo ($key + 1). ") " . $opcionParticular."\n";

    }
    do{
        echo "Ingrese una opción(nro): ";
        $eleccion = trim(fgets(STDIN));
        if($eleccion < 1 || $eleccion > count($TotalOpciones)){
            echo "Opción no válida. Pruebe otra opción"."\n";
        }
    }while($eleccion < 1 || $eleccion > count($TotalOpciones));

    return $eleccion;
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
 * @param array
 * @param string
 * 
 * @return 
 * 
 */
function primeraVictoria($partidas,$jugador){   //esta en la funcion 6 del enunciado, se utiliza en el case 4
$victoria = false;
$numPartida = 1;

    foreach($partidas as $partida){
        //busca la partida que coincida con el nombre ingresado y extrae los datos necesarios
        if ($partida["jugador"] == $jugador && $partida["puntaje"] != 0 ){ 
            echo  "\n**************************************"."\nPartida WORDIX ".$numPartida.": palabra ".$partida["palabraWordix"] ."\nJugador: ". $partida["jugador"] ."\nCantidad de intentos: ". $partida["intentos"] ."\nPuntaje: ". $partida["puntaje"]. "\n**************************************\n";
            $victoria = true;
            break;
        }
        $numPartida++;

      }

      if (!$victoria) {
        echo "\n".$jugador." Nunca gano una partida.\n";
        return -1;
}

}



/**
 * La función inicializa la estructura de datos asociativa resumenJugador para ser utilizada por la función 9.
 * 
 * @return array
 */
function inicializarResumenJugador() {
    // array $resumenJugador
    $resumenJugador = [
        "jugador" => "",
        "partidas" => 0,
        "puntajeTotal" => 0,
        "victorias" => 0,
        "intento1" => 0,
        "intento2" => 0,
        "intento3" => 0,
        "intento4" => 0,
        "intento5" => 0,
        "intento6" => 0,
    ];
    return $resumenJugador;
}




/**
 * Función 9
 * Case 5
 */

 function recopilarEstadisticasJugador($partidas, $jugador){
    // array $resumenJugador
    $resumenJugador = inicializarResumenJugador();
    $resumenJugador["jugador"] = $jugador;
    
        if (elNombeExiste($partidas, $jugador)){    //si el nombre existia, entra para seguir calculando

            foreach ($partidas as $estadisticasJugador){
                if ($estadisticasJugador["jugador"] == $jugador ) {   //cuando encuentra el nombre, extrae todos los datos necesarios de su partida
                    $resumenJugador["partidas"]++;
                    $resumenJugador["puntaje"] += $estadisticasJugador["puntaje"];

                    switch($estadisticasJugador["intentos"]){
                        case 1 : $resumenJugador["intento1"]++; break;
                        case 2 : $resumenJugador["intento2"]++; break;
                        case 3 : $resumenJugador["intento3"]++; break;       //filtra sus cantidades de intentos y los acumula
                        case 4 : $resumenJugador["intento4"]++; break;
                        case 5 : $resumenJugador["intento5"]++; break;
                        case 6 : $resumenJugador["intento6"]++; break;
                        default : break;
                    }
                }
            }
            $resumenJugador["victorias"] = $resumenJugador["intento1"] + $resumenJugador["intento2"] + $resumenJugador["intento3"]
            + $resumenJugador["intento4"] + $resumenJugador["intento5"] + $resumenJugador["intento6"];
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
    //compara de forma numerica los nombres y sus palabras jugadas
    $comparacionNombreJugador = strcmp ($array1["jugador"], $array2["jugador"]);
    $comparacionPalabraJugada = strcmp($array1["palabraWordix"], $array2["palabraWordix"]);

        if ($comparacionNombreJugador != 0){
            return $comparacionNombreJugador;                               //esta tambien es la funcion 11
        } else {
            return $comparacionPalabraJugada;
        }
}


/**
 *  La funcion tiene como entrada una coleccion de palabras y una palabra para verificar si la palabra ya se encuentra
 * en la colección retornando una variable booleana.
 * 
 * @param array $coleccionPalabrasDondeVerifica
 * @param string $palabraAVerificar
 * @return boolean
 */
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
    } while ($existe == false || count($coleccionPalabrasDondeVerifica) > $i); 
    return $existe;
}


/**
 * Función 7
 * Case 7
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


 /**
 * Función 10
 * La función solicita al usuario el nombre de un jugador y lo retorna en minúsculas. Verifica que comience con una letra.
 */
function solicitarJugador() {
    // string $jugador
    echo "\nIngrese el nombre del jugador: ";
    $jugador = trim(fgets(STDIN));
    if (ctype_alpha($jugador[0])) {
        $jugador = strtolower($jugador);
    }
    while (!ctype_alpha($jugador[0])) {
        echo "\nEl nombre debe comenzar con una letra.\nIngrese el nombre del jugador: ";
        $jugador = trim(fgets(STDIN));
        if (ctype_alpha($jugador[0])) {
            $jugador = strtolower($jugador);
        }
    }
    return $jugador;
}




/**
 * Función case 1
 * Pide un numero y checkea que no haya sido jugado.
 * 
 * @param array $partidasjugadoresGenerales, $cantLetrasDePalabraOculta
 * @param string $nombre
 * @return int $numeroElegido
 * 
 */
function checkNumeroJugar($nombre,$partidasjugadoresGenerales, $cantLetrasDePalabraOculta) {
    // boolean $partidaRepetida. int $numeroElegido
    $partidaRepetida = false;

    do {
        // Checkea si el array del jugador está creado, si no lo está, lo crea.
        if (!isset($partidasjugadoresGenerales[$nombre])) {
            $partidasjugadoresGenerales[$nombre] = [];
        }

        $numeroElegido = solicitarNumeroEntre($cantLetrasDePalabraOculta);
        $partidaRepetida = false;

        // Revisa en todo el array si la palabra coincide con el número elegido.
        foreach ($partidasjugadoresGenerales[$nombre] as $numero) {
            if ($numero == $numeroElegido) {
                $partidaRepetida = true;
                echo "El número de partida ya ha sido jugado por " . $nombre . ", por favor elija otro.\n";
                break; // Se encontró una coincidencia, se sale del bucle
            }
        }
    } while ($partidaRepetida);

    // Agrega el número jugado al array de partidas del jugador
    $partidasjugadoresGenerales[$nombre][] = $numeroElegido;

    return $numeroElegido;
}




/**
 * Función case 1 & 2
 * La función checkea si un jugador ya jugó todas las palabras posibles.
 * 
 * @param array $partidasjugadoresGenerales, $cantLetrasDePalabraOculta
 * @param string $nombre
 * @return boolean $agoto
 * 
 */
function agotoPalabras($nombre,$partidasjugadoresGenerales,$cantLetrasDePalabraOculta) {
    // boolean $agoto, int $numeroDePartidas
    $agoto = false;

    // Checkea si el array del jugador está creado, si no lo está, lo crea.
    if (!isset($partidasjugadoresGenerales[$nombre])) {
        $partidasjugadoresGenerales[$nombre] = [];
    }

    //En caso de haber jugado todas las palabras posibles, dar un mensaje de error.
    $numeroDePartidas = count($partidasjugadoresGenerales[$nombre]);
    if ($numeroDePartidas  == $cantLetrasDePalabraOculta) {
        echo "\n***********************************************************************"."\n Usted ya jugó todas las palabras disponibles, por favor, agregue más."."\n***********************************************************************\n\n";
        $agoto = true;
    }
    return $agoto;
}

/**
 * Función case 2
 * La función checkea si un jugador ya jugó todas las palabras posibles.
 * 
 * @param array $partidasjugadoresGenerales, $cantLetrasDePalabraOculta
 * @param string $nombre
 * @return boolean $numeroAleatorio
 * 
 */
function randomNojugado($nombre,$partidasjugadoresGenerales,$cantLetrasDePalabraOculta) {
    // boolean $partidaRepetida, int $numeroDePartidas $numeroAleatorio
    $partidaRepetida = false;
    //Checkea si el array del jugador está creado, si no lo está, lo crea.
    if (!isset($partidasjugadoresGenerales[$nombre])) {
       $partidasjugadoresGenerales[$nombre] = [];
   } 
   $numeroDePartidas = count($partidasjugadoresGenerales[$nombre]);   
   //Realiza un bucle de palabras aleatorias para asegurarse que no se repitan.
   do {
       if ($numeroDePartidas == $cantLetrasDePalabraOculta) {
           break;
       }
       $numeroAleatorio = rand(0, ($cantLetrasDePalabraOculta -1));
       $partidaRepetida = false;
       foreach ($partidasjugadoresGenerales[$nombre] as $numero) {
           if ($numero == $numeroAleatorio) {
               $partidaRepetida = true;
               break;
           }
       }
   } while ($partidaRepetida);

    return $numeroAleatorio;
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
$extraerPartidas = cargarPartidas();  //12)a)
$palabrasDisponibles = cargarColeccionPalabras(); //12)b)
$cantLetrasDePalabraOculta = count($palabrasDisponibles);
$partidaJugada = [];
$estadisticasJugador =[];

//Partidas pre-cargadas
$partidasjugadoresGenerales = ["majo"=> [1],"rudolf"=> [3],"pink2000" => [1],"cau"=> [3],"mauro"=> [13],"gabi"=> [14],"calemchu"=> [16],"valentin"=> [8,11,16]];


do {       
$opcion = opcionElegida();
switch ($opcion) {  //CONTESTAR

    //12)d)
        case 1:
            //Jugar al wordix con una palabra elegida
         
            $nombreDelJugador = solicitarJugador();

            //Checkea que el jugador no haya agotado las palabras.
            $checkAgoto = agotoPalabras($nombreDelJugador,$partidasjugadoresGenerales,$cantLetrasDePalabraOculta);
            if($checkAgoto){
                break;
            }

            //Checkea que el número se ingrese de manera correcta y no haya sido jugado por el jugador.
            $checkNumero = checkNumeroJugar($nombreDelJugador,$partidasjugadoresGenerales,$cantLetrasDePalabraOculta);

             //Se juega la partida y se almacenan datos en los arrays. 
             $palabraSecreta = $palabrasDisponibles[$checkNumero];
             $partidaJugada = jugarWordix($palabraSecreta, strtolower($nombreDelJugador));
             array_push($extraerPartidas, $partidaJugada);
             array_push($partidasjugadoresGenerales[$nombreDelJugador], $checkNumero);
            

            break;

        case 2: 
            //Jugar al wordix con una palabra aleatoria


            $nombreDelJugador = solicitarJugador();

            //Checkea si el array del jugador está creado, si no lo está, lo crea.
            if (!isset($partidasjugadoresGenerales[$nombreDelJugador])) {
                $partidasjugadoresGenerales[$nombreDelJugador] = [];
            } 

            //Checkea que el jugador no haya agotado las palabras.
            $checkAgoto = agotoPalabras($nombreDelJugador,$partidasjugadoresGenerales,$cantLetrasDePalabraOculta);
            if($checkAgoto){
                break;
            }

            //Consigue una palabra no jugada anteriormente.
            $numeroAleatorio = randomNojugado($nombreDelJugador,$partidasjugadoresGenerales,$cantLetrasDePalabraOculta);        
            
            //Se juega la partida y se almacenan datos en los arrays. 
            $palabraSecreta = $palabrasDisponibles[$numeroAleatorio];
            $partidaJugada = jugarWordix($palabraSecreta, strtolower($nombreDelJugador));
            array_push($extraerPartidas, $partidaJugada);
            array_push($partidasjugadoresGenerales[$nombreDelJugador], $numeroAleatorio);
            break;


        case 3: 
            //Mostrar una partida
            //(Explicado a detalle en asana)

            $cantidadDePartidas = count($extraerPartidas);
            echo "Ingrese el número de partida que desee ver: ";
            $numReview = trim(fgets(STDIN));
            $numReview -= 1;
            if ((($numReview + 1) > 0) && ($numReview < $cantidadDePartidas)){
            $reviewPalabra = $extraerPartidas[$numReview]["palabraWordix"];
            $reviewJugador = $extraerPartidas[$numReview]["jugador"];
            $reviewIntentos = $extraerPartidas[$numReview]["intentos"];
            $reviewPuntaje = $extraerPartidas[$numReview]["puntaje"];
            if($reviewPuntaje == 0){           
                echo "\n*********************************\nPartida WORDIX ".($numReview+1),": ".$reviewPalabra,"\nJugador: ".$reviewJugador,"\nPuntaje: ".$reviewPuntaje,"\nIntento: No adivinó la palabra. \n*********************************";
            }else{
                echo "\n*********************************\nPartida WORDIX ".($numReview+1),": ".$reviewPalabra,"\nJugador: ".$reviewJugador,"\nPuntaje: ".$reviewPuntaje,"\nIntento: ".$reviewIntentos,"\n*********************************\n";          
            }
            
        }else{
            echo "Número fuera de rango, hasta el momento se jugaron ".$cantidadDePartidas," partidas.\n\n";
        }

            break;
        case 4: 
          //extraemos las partidas jugadas y pedimos el nombre del jugador
          $nombreDelJugador = solicitarJugador();
            
          //mostramos la primera partida ganada del jugador 
          primeraVictoria($extraerPartidas, $nombreDelJugador);

            break;

        case 5:
            $nombreDelJugador = solicitarJugador();

            if (elNombeExiste($extraerPartidas,$nombreDelJugador)){
            //llamamos a la funcion recopilarEstadisticasJugador y guardamos su retorno con las partidas extraidas
            $estadisticasJugador = recopilarEstadisticasJugador($extraerPartidas,$nombreDelJugador);


            echo "\n**************************************\n";
            echo "Jugador: ".$estadisticasJugador["jugador"];
            echo "\nPartidas: ". $estadisticasJugador["partidas"];
            echo "\nPuntaje total: ". $estadisticasJugador["puntaje"];
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
            }
            

            break;

        case 6:
            //extrae todas las partidas guardadas
           

            //usamos la funcion uasort y la funcion miComparacion para ordenar el array de forma alfabetica
            uasort($extraerPartidas, 'miComparacion'); 

            print_r($extraerPartidas);
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
} while ($opcion != 8);      //12)c)