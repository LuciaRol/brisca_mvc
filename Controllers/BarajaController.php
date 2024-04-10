<?php 
namespace Controllers;
use Controllers\FrontController;

use Models\Baraja;
Class BarajaController {

    function mostrarBaraja(){
        require_once 'Views\Menu\mostrarBaraja.php';
        echo "<h2>Esta es la opción Mostrar BARAJA, que muestra la baraja entera ordenada por palos</h2>";
    }

    function barajar(){
        require_once 'Views\Menu\mazoBarajado.php';
        echo "<h2>Esta es la opción BARAJAR EL MAZO, que muestra el mazo completo barajado</h2>";
    }

}