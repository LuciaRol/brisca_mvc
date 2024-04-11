<?php 
namespace Controllers;
use Controllers\FrontController;

use Models\Carta;

class CartaController {
    function mostrarCarta() {
        $carta = Carta::generarCartaAleatoria();

        // Construct the image URL based on the card's suit and number
        $imagen = "./img/{$carta->getPalo()}_{$carta->getNumero()}.jpg";
        echo "<img src='$imagen' alt=''>";

        // Include the view to display the card image
        require_once 'Views/Menu/mostrarCarta.php';

        echo "<h2>Esta es la opción Mostrar CARTA, que muestra la carta que se extrae al azar y la baraja sin esa carta</h2>";
    }

    function sacarUltimaCarta() {
        // Include the view for this action
        require_once 'Views/Menu/sacarUltimaCarta.php';
        echo "<h2>Esta es la opción SACAR ÚLTIMA CARTA DEL MAZO</h2>";
    }

    function tresCartas() {
        // Include the view for this action
        require_once 'Views/Menu/tresCartas.php';
        echo "<h2>Esta es la opción REPARTIR TRES CARTAS A UN JUGADOR</h2>";
    }
}