<?php 
namespace Controllers;
use Controllers\FrontController;

use Models\Carta;
use Models\Baraja;

class CartaController {
    function mostrarCarta() {
        $carta = Carta::generarCartaAleatoria();

        // muestra una carta
        $imagen = "./img/{$carta->getPalo()}_{$carta->getNumero()}.jpg";
        echo "<img src='$imagen' alt=''><hr>";
        
        $cartasRestantes = [];
        foreach (Carta::PALOS as $palo) {
            foreach (Carta::CARTAS as $numero => $valor) {
                if ($numero !== $carta->getNumero() || $palo !== $carta->getPalo()) {
                    $cartasRestantes[] = new Carta($numero, $palo);
                }
            }
        }

        // Muestra el resto de cartas del mazo
        foreach ($cartasRestantes as $cartaRestante) {
            $imagenRestante = "./img/{$cartaRestante->getPalo()}_{$cartaRestante->getNumero()}.jpg";
            echo "<img src='$imagenRestante' alt=''>";
        }


        // Include the view to display the card image
        require_once 'Views/Menu/mostrarCarta.php';

        echo "<h2>Esta es la opción Mostrar CARTA, que muestra la carta que se extrae al azar y la baraja sin esa carta</h2>";
    }

    function sacarUltimaCarta() {

        $baraja = new Baraja();
        // Baraja el mazo de cartas
        /* $baraja->barajarMazo(); */
        // Obtiene la baraja de rutas de imágenes
        $ultimaCarta = $baraja->extraerCarta();

        // Itera sobre la lista de imágenes y las muestra en la página
        echo "<img src='$ultimaCarta' alt=''>";

        // Include the view for this action
        require_once 'Views/Menu/sacarUltimaCarta.php';
        echo "<h2>Esta es la opción SACAR ÚLTIMA CARTA DEL MAZO</h2>";
    }

    function tresCartas() {
        
        $baraja = new Baraja();
        // Baraja el mazo de cartas
        $baraja->barajarMazo();
        // Obtiene la baraja de rutas de imágenes
        $imagenes = $baraja->getBaraja();
    
        // Mostrar las imágenes de las tres primeras cartas
        for ($i = 0; $i < 3; $i++) {
            echo "<img src='{$imagenes[$i]}' alt=''>";
        }

        require_once 'Views/Menu/tresCartas.php';
        echo "<h2>Esta es la opción REPARTIR TRES CARTAS A UN JUGADOR</h2>";
    }

    function diezCartas() {
        
        $baraja = new Baraja();
        // Baraja el mazo de cartas
        $baraja->barajarMazo();
        // Obtiene la baraja de rutas de imágenes
        $imagenes = $baraja->getBaraja();
    
        // Mostrar las imágenes de las diez cartas y guardar los números de las cartas
        $numerosCartas = [];
        for ($i = 0; $i < 10; $i++) {
            $rutaCarta = $imagenes[$i];
            $numeroCarta = basename($rutaCarta, '.jpg'); // Obtenemos el número de la carta desde la ruta de la imagen
            $numerosCartas[] = $numeroCarta; // Guardamos el número de la carta
            echo "<img src='$rutaCarta' alt=''>";
        }

        // Calcula el total de puntos de las 10 cartas
        $totalPuntos = Baraja::calcularTotal($numerosCartas);
        echo "<p>Total de puntos de las 10 cartas: $totalPuntos</p>";

        require_once 'Views/Menu/diezCartas.php';
        echo "<h2>Esta es la opción REPARTIR DIEZ CARTAS A UN JUGADOR</h2>";
    
    }

    function variosJugadores() {
        $num_jugadores = 2;
        $baraja = new Baraja();
        // Baraja el mazo de cartas
        $baraja->barajarMazo();
        // Obtiene la baraja de rutas de imágenes
        $imagenes = $baraja->getBaraja();
        
        // Dividir el mazo en dos partes, una para cada jugador
        $mitadMazo = count($imagenes) / $num_jugadores;
        $jugador1Cartas = array_slice($imagenes, 0, $mitadMazo);
        $jugador2Cartas = array_slice($imagenes, $mitadMazo);
    
        // Mostrar las imágenes de las tres primeras cartas para el jugador 1
        echo "<h2>Jugador 1</h2>";
        for ($i = 0; $i < 3; $i++) {
            echo "<img src='{$jugador1Cartas[$i]}' alt=''>";
        }
    
        // Mostrar las imágenes de las tres primeras cartas para el jugador 2
        echo "<h2>Jugador 2</h2>";
        for ($i = 0; $i < 3; $i++) {
            echo "<img src='{$jugador2Cartas[$i]}' alt=''>";
        }
    
        // Aquí podrías continuar con el resto de la lógica de tu juego
    }
    
    

    function partida(){
        require_once 'Views/Menu/partida.php';
        echo "<h2>la partida</h2>";
    }
}