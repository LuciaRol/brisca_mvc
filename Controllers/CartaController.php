<?php 
namespace Controllers;
use Controllers\FrontController;

use Models\Carta;
Class CartaController {
    function mostrarCarta(carta $carta){
        $numero = $carta->getNumero(); // esta línea está bien
        // por aquí faltarían más cosas

        require_once 'Views\Menu\mostrarCarta.php';
        echo "<h2>Esta es la opción Mostrar CARTA, que muestra la carta que se extrae al azar y la baraja sin esa carta</h2>";
    }

    function sacarUltimaCarta(){

        require_once 'Views\Menu\sacarUltimaCarta.php';
        echo "<h2>Esta es la opción SACAR ÚLTIMA CARTA DEL MAZO</h2>";
    }

    function tresCartas(){

        require_once 'Views\Menu\.php';
        echo "<h2>Esta es la opción REPARTIR TRES CARTAS A UN JUGADOR</h2>";
    }
}