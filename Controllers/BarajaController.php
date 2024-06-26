<?php

namespace Controllers;

use Models\Baraja;
use Lib\Pages;

class BarajaController {

    // MÉTODO QUE LLEVA A LA VISTA QUE MUESTRA LA BARAJA
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
        echo "<h2 class='title'>Baraja completa ordenada</h2>";
        foreach ($imagenes as $imagen) {
            echo "<img src='$imagen' alt=''>";
        }
    }

    // MÉTODO QUE LLEVA A LA VISTA DEL MAZO BARAJADO
    function barajar() {
        // Incluir la vista del mazo barajado
        //require_once 'Views\Menu\mazoBarajado.php';
        $pagina = new Pages;
        $pagina->render('Menu/mazoBarajado');

        // Barajar el mazo de cartas
        $baraja = new Baraja();
        $baraja->barajarMazo(); 
        
        // Obtener la baraja barajada
        $imagenes = $baraja->getBaraja();
    
        // Mostrar las imágenes del mazo barajado
        echo "<h2 class='title'>Mazo completo barajado</h2>";
        foreach ($imagenes as $imagen) {
            echo "<img src='$imagen' alt=''>";
        }
    
    }
}
