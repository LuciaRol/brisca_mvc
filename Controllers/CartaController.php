<?php 
namespace Controllers;
use Controllers\FrontController;

use Models\Carta;
Class CartaController {
    function mostrarCarta(carta $carta){
        $numero = $carta->getNumero(); // esta línea está bien

        require_once 'Views\Menu\mostrarCarta.php';
        echo "<h2>Esta es la opción Mostrar CARTA, que muestra la carta que se extrae al azar y la baraja sin esa carta</h2>";
    }
}