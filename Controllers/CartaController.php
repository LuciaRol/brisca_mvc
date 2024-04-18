<?php 
namespace Controllers;
use Controllers\FrontController;

use Models\Carta;
use Models\Baraja;
use Lib\Pages;
use Views\Menu\variosJugadores;


class CartaController {
    function mostrarCarta() {
        $pagina = new Pages;

        /* Llamar al método render antes de imprimir las imágenes:
        esto es lo que sustituye al require_once cuando se usa el Pages.php 
        require_once 'Views\Menu\mostrarbaraja.php';*/
        
        //$pagina->render ('Menu/mostrarBaraja', ['imagen'=> $imagen]);
        $pagina->render('Menu/mostrarBaraja');
        
        echo "<h2>Esta es la opción Mostrar CARTA, que muestra la carta que se extrae al azar y la baraja sin esa carta</h2>";
        
        
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


        require_once 'Views/Menu/mostrarCarta.php';

    }

    function sacarUltimaCarta() {
        $pagina = new Pages;
    
        // Renderizar la vista mostrarBaraja
        $pagina->render('Menu/mostrarBaraja');
        
        echo "<h2>Esta es la opción SACAR ÚLTIMA CARTA DEL MAZO. El mazo está sin barajar</h2>";
    
        $baraja = new Baraja();
        // No es necesario barajar el mazo si solo queremos sacar la última carta
        $baraja->barajarMazo(); 
        
        $imagenes = $baraja->getBaraja();
        // Mostrar la baraja completa
        echo "<h3>Baraja completa:</h3>";
        foreach ($imagenes as $imagen) {
            echo "<img src='$imagen' alt=''>";
        }

        echo "<p>Última Carta</p><hr>";

        $ultimaCarta = $baraja->extraerCarta();
        

        
        // Mostrar la última carta extraída
        echo "<img src='$ultimaCarta' alt=''>";
    
        // Obtener las imágenes de todas las cartas restantes en la baraja
        $cartasRestantes = $baraja->getBaraja();
    
        // Mostrar todas las cartas restantes en la baraja
        echo "<h3>Cartas restantes en el mazo:</h3>";
        foreach ($cartasRestantes as $carta) {
            echo "<img src='$carta' alt=''>";
        }
    
        require_once 'Views/Menu/sacarUltimaCarta.php';
    }
    

    function tresCartas() {

        $pagina = new Pages;

        /* Llamar al método render antes de imprimir las imágenes:
        esto es lo que sustituye al require_once cuando se usa el Pages.php 
        require_once 'Views\Menu\mostrarbaraja.php';*/
        
        //$pagina->render ('Menu/mostrarBaraja', ['imagen'=> $imagen]);
        $pagina->render('Menu/mostrarBaraja');
        
        echo "<h2>Esta es la opción REPARTIR DIEZ CARTAS A UN JUGADOR</h2>";

        $baraja = new Baraja();
        $baraja->barajarMazo();
        $imagenes = $baraja->getBaraja();

            // Mostrar la baraja completa
        echo "<h3>Baraja completa:</h3>";
        foreach ($imagenes as $imagen) {
            echo "<img src='$imagen' alt=''>";
        }

        echo "<p>3 cartas</p><hr>";
    
        // Mostrar las imágenes de las diez cartas y guardar los números de las cartas
        $numerosCartas = [];
        for ($i = 0; $i < 3; $i++) {
            $rutaCarta = $imagenes[$i];
            $numeroCarta = basename($rutaCarta, '.jpg'); // Obtenemos el número de la carta desde la ruta de la imagen
            $numerosCartas[] = $numeroCarta; // Guardamos el número de la carta
            echo "<img src='$rutaCarta' alt=''>";
        }
    
        // Calcula el total de puntos de las 10 cartas
        $totalPuntos = Baraja::calcularTotal($numerosCartas);
        echo "<p>Total de puntos de las 3 cartas: $totalPuntos</p>";
    
        // Mostrar el resto de las cartas del mazo
        echo "<h3>Cartas restantes en el mazo:</h3>";
        for ($i = 3; $i < count($imagenes); $i++) {
            $rutaCarta = $imagenes[$i];
            echo "<img src='$rutaCarta' alt=''>";
        }
    
        require_once 'Views/Menu/diezCartas.php';
    }

    function diezCartas() {

        $pagina = new Pages;

        /* Llamar al método render antes de imprimir las imágenes:
        esto es lo que sustituye al require_once cuando se usa el Pages.php 
        require_once 'Views\Menu\mostrarbaraja.php';*/
        
        //$pagina->render ('Menu/mostrarBaraja', ['imagen'=> $imagen]);
        $pagina->render('Menu/mostrarBaraja');
        
        echo "<h2>Esta es la opción REPARTIR DIEZ CARTAS A UN JUGADOR</h2>";

        $baraja = new Baraja();
        $baraja->barajarMazo();
        $imagenes = $baraja->getBaraja();

        // Mostrar la baraja completa
        echo "<h3>Baraja completa:</h3>";
        foreach ($imagenes as $imagen) {
            echo "<img src='$imagen' alt=''>";
        }

        echo "<p>10 cartas</p><hr>";
    
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
    
        // Mostrar el resto de las cartas del mazo
        echo "<h3>Cartas restantes en el mazo:</h3>";
        for ($i = 10; $i < count($imagenes); $i++) {
            $rutaCarta = $imagenes[$i];
            echo "<img src='$rutaCarta' alt=''>";
        }
    
        require_once 'Views/Menu/diezCartas.php';
    }
    

    function variosJugadores() {
       
        // Si el formulario se hace submit, sale el número
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Se asegura que el numero de jugadores esté en el rango
            $num_jugadores = max(2, min(6, $_POST['num_jugadores']));
        } else {
            // si no se especifica número, el default son 4
            $num_jugadores = 4;
        }
    
        $pagina = new Pages;

        // Render the baraja view
        $pagina->render('Menu/mostrarBaraja');
    
        // Form para poner el numero de jugadores
        echo "
        <h3>Enter the number of players:</h3>
        <form method='post' action=''>
            <input type='number' name='num_jugadores' min='2' max='6' value='$num_jugadores'>
            <input type='submit' value='Enviar'>
        </form>
        ";
    
        
        
        echo "<h3>Baraja completa:</h3>";
        
        $baraja = new Baraja();
        $baraja->barajarMazo();
        $imagenes = $baraja->getBaraja();
        
        // Se muestra toda la baraja
        foreach ($imagenes as $imagen) {
            echo "<img src='$imagen' alt=''>";
        }
        
        // Se divide el mazo
        $partesMazo = count($imagenes) / $num_jugadores;
        $jugadoresCartas = [];
        for ($i = 0; $i < $num_jugadores; $i++) {
            $jugadoresCartas[] = array_slice($imagenes, $i * $partesMazo, $partesMazo);
        }
        
        // Cada jugador tiene sus cartas y el valor de sus 3 cartas
        for ($j = 0; $j < $num_jugadores; $j++) {
            echo "<h2>Jugador " . ($j + 1) . "</h2>";
            $cartasJugador = [];
            for ($i = 0; $i < 3; $i++) {
                $carta = $jugadoresCartas[$j][$i];
                echo "<img src='$carta' alt=''>";
                $numeroCarta = basename($carta, '.jpg');
                $cartasJugador[] = $numeroCarta; //guardamos el número de la carta para la puntuacion
                


            }
            // Se calcula la puntuación con el número de cada carta
            $puntuacion = Baraja::calcularTotal($cartasJugador);
            echo "<p>Jugador " . ($j + 1) . " puntuación: $puntuacion</p>";
        }
    
        // Mostrar las imágenes restantes de la baraja
        echo "<h3>Cartas restantes en el mazo:</h3>";
        $cartaInicio = $num_jugadores * 3; 
        for ($i = $cartaInicio; $i < count($imagenes); $i++) {
            $rutaCarta = $imagenes[$i];
            echo "<img src='$rutaCarta' alt=''>";
        }
    }
    
    
    
    
    
}