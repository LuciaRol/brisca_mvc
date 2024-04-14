<?php

namespace Controllers;

use Models\Baraja;
use Lib\Pages;

class BarajaController {

    // función para mostrar la baraja por palos
    function mostrarBaraja() {
        // Crear una instancia de la clase Pages
        $pagina = new Pages;

        /* Llamar al método render antes de imprimir las imágenes:
        esto es lo que sustituye al require_once cuando se usa el Pages.php 
        require_once 'Views\Menu\mostrarbaraja.php';*/
        
        //$pagina->render ('Menu/mostrarBaraja', ['imagen'=> $imagen]);
        $pagina->render('Menu/mostrarBaraja');

        // Obtener la baraja con las imágenes
        $baraja = new Baraja();
        $imagenes = $baraja->getBaraja(); 

        // Mostrar las imágenes en la página
        echo "<h2>Estas son las imágenes de la baraja</h2>";
        foreach ($imagenes as $imagen) {
            echo "<img src='$imagen' alt=''>";
        }
    }

    // función para mostrar el mazo barajado
    function barajar() {
        // Incluir la vista del mazo barajado
        require_once 'Views\Menu\mazoBarajado.php';

        // Barajar el mazo de cartas
        $baraja = new Baraja();
        $baraja->barajarMazo(); 
        
        // Obtener la baraja barajada
        $imagenes = $baraja->getBaraja();
    
        // Mostrar las imágenes del mazo barajado
        foreach ($imagenes as $imagen) {
            echo "<img src='$imagen' alt=''>";
        }
        
        // Mostrar mensaje
        echo "<h2>Esta es la opción BARAJAR EL MAZO, que muestra el mazo completo barajado</h2>";
    }
}
