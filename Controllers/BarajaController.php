<?php 
namespace Controllers;
use Controllers\FrontController;

use Models\Baraja;
Class BarajaController {

    function mostrarBaraja(){
        require_once 'Views\Menu\mostrarBaraja.php';
        // Crea una instancia de la baraja para obtener las rutas de las imágenes
        $baraja = new Baraja();
        // Baraja el mazo de cartas
        $baraja->barajarMazo();
        // Obtiene la baraja de rutas de imágenes
        $imagenes = $baraja->getBaraja();
    
        // Itera sobre la lista de imágenes y las muestra en la página
        foreach ($imagenes as $imagen) {
            // Muestra la imagen
            echo "<img src='$imagen' alt=''>";
        }
        
    
        // Imprime un título indicando que estas son las imágenes de la baraja
        echo "<h2>Estas son las imágenes de la baraja</h2>";
    }

    function barajar(){
        
        require_once 'Views\Menu\mazoBarajado.php';
        $baraja = new Baraja();
        // Baraja el mazo de cartas
        $baraja->barajarMazo();
        // Obtiene la baraja de rutas de imágenes
        $imagenes = $baraja->getBaraja();
    
        // Itera sobre la lista de imágenes y las muestra en la página
        foreach ($imagenes as $imagen) {
            // Muestra la imagen
            echo "<img src='$imagen' alt=''>";
        }
        
        echo "<h2>Esta es la opción BARAJAR EL MAZO, que muestra el mazo completo barajado</h2>";
    }

}