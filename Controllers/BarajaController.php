<?php 
namespace Controllers;

use Models\Baraja;
use Lib\Pages;
Class BarajaController {

    // función para mostrar la baraja por palos
    function mostrarBaraja(){
        /* require_once 'Views\Menu\mostrarBaraja.php'; */

        $baraja = new Baraja();
        $imagenes = $baraja->getBaraja(); // Obtiene la baraja con las imágenes

        echo "<h2>Estas son las imágenes de la baraja</h2>";
        // Itera sobre la lista de imágenes y las muestra en la página
        foreach ($imagenes as $imagen) {
            echo "<img src='$imagen' alt=''>";
        }

        $pagina = new Pages;
        $pagina->render ('Menu/mostrarBaraja', ['imagen'=> $imagen]);
        
        
        
    }

    // función para mostrar el mazo barajado
    function barajar(){
        
        require_once 'Views\Menu\mazoBarajado.php';
        $baraja = new Baraja();
        $baraja->barajarMazo(); // Baraja el mazo de cartas
        
        $imagenes = $baraja->getBaraja();
    
        foreach ($imagenes as $imagen) {
            echo "<img src='$imagen' alt=''>";
        }
        
        echo "<h2>Esta es la opción BARAJAR EL MAZO, que muestra el mazo completo barajado</h2>";
    }

}