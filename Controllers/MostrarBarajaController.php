<?php 
namespace Controllers;
use Controllers\FrontController;
Class MostrarBarajaController {

    function mostrarBaraja(){
        require_once 'Views\mostrarBaraja.php';
        echo "<h2>Esta es la opción Mostrar baraja, que muestra la baraja entera ordenada por palos</h2>";
        
    }
}