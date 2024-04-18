<?php 
namespace Controllers;
use Controllers\FrontController;

use Models\Carta;
use Models\Baraja;
use Lib\Pages;
use Views\Menu\variosJugadores;


class CartaController {

    // MÉTODO QUE SACA UNA CARTA AL AZAR Y LUEGO MUESTRA LA BARAJA SIN ESA CARTA
    function mostrarCarta() {
        $pagina = new Pages;
        $pagina->render('Menu/mostrarCarta');
        
        $carta = Carta::generarCartaAleatoria();

        // muestra una carta
        echo "<h2>Se saca una carta al azar del mazo y se muestra el mazo sin esa carta.</h2>";
        $imagen = "./img/{$carta->getPalo()}_{$carta->getNumero()}.jpg";
        echo "<img src='$imagen' alt=''><br/>";
        
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

    }


    // MÉTOSO QUE LLEVA A LA VISTA QUE SACA LA ÚLTIMA CARTA DEL MAZO Y MUESTRA LA BARAJA SIN ESA CARTA
    function sacarUltimaCarta() {
        $pagina = new Pages;
        $pagina->render('Menu/sacarUltimaCarta');
    
        $baraja = new Baraja();
        // No es necesario barajar el mazo si solo queremos sacar la última carta con la baraja ordenada
        $baraja->barajarMazo(); 
        
        $imagenes = $baraja->getBaraja();
        // Mostrar la baraja completa
        echo "<h2>Mazo completo barajado:</h2>";
        foreach ($imagenes as $imagen) {
            echo "<img src='$imagen' alt=''>";
        }

        echo "<h2>Última carta del mazo:</h2><br>";

        $ultimaCarta = $baraja->extraerCarta();
        

        
        // Mostrar la última carta extraída
        echo "<img src='$ultimaCarta' alt=''><br/>";
    
        // Obtener las imágenes de todas las cartas restantes en la baraja
        $cartasRestantes = $baraja->getBaraja();
    
        // Mostrar todas las cartas restantes en la baraja
        echo "<h2>Mazo barajado sin esa carta:</h2>";
        foreach ($cartasRestantes as $carta) {
            echo "<img src='$carta' alt=''>";
        }
    }
    

    // MÉTODO QUE SACA UNA BAZA DE TRES CARTAS PARA UN JUGADOR 
    function tresCartas() {

        $pagina = new Pages;
        $pagina->render('Menu/tresCartas');
        
        echo "<h2>Baza de tres cartas a un único jugador</h2>";

        $baraja = new Baraja();
        $baraja->barajarMazo();
        $imagenes = $baraja->getBaraja();

        // Mostrar la baraja completa
        echo "<h2>Baraja completa:</h2>";
        foreach ($imagenes as $imagen) {
            echo "<img src='$imagen' alt=''>";
        }

        echo "<h2>Baza de tres cartas</h2><br>";
    
        // Mostrar las imágenes de las tres cartas y guardar los números de las cartas
        $numerosCartas = [];
        for ($i = 0; $i < 3; $i++) {
            $rutaCarta = $imagenes[$i];
            $numeroCarta = basename($rutaCarta, '.jpg'); // Obtenemos el número de la carta desde la ruta de la imagen
            $numerosCartas[] = $numeroCarta; // Guardamos el número de la carta
            echo "<img src='$rutaCarta' alt=''>";
        }
    
        // Calcula el total de puntos de las 3 cartas
        $totalPuntos = Baraja::calcularTotal($numerosCartas);
        echo "<p>Total de puntos de las cartas: $totalPuntos</p>";
    
        // Mostrar el resto de las cartas del mazo
        echo "<h2>Cartas restantes en el mazo:</h2>";
        for ($i = 3; $i < count($imagenes); $i++) {
            $rutaCarta = $imagenes[$i];
            echo "<img src='$rutaCarta' alt=''>";
        }
    }

    // MÉTODO QUE SACA UNA BAZA DE TRES CARTAS PARA UN JUGADOR 
    function diezCartas() {

        $pagina = new Pages;
        $pagina->render('Menu/diezCartas');
        
        echo "<h2>Baza de diez cartas a un único jugador</h2>";

        $baraja = new Baraja();
        $baraja->barajarMazo();
        $imagenes = $baraja->getBaraja();

        // Mostrar la baraja completa
        echo "<h3>Baraja completa:</h3>";
        foreach ($imagenes as $imagen) {
            echo "<img src='$imagen' alt=''>";
        }

        echo "<h2>Baza de diez cartas:</h2><br>";
    
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
        echo "<h2>Total de puntos de las 10 cartas: $totalPuntos</h2>";
    
        // Mostrar el resto de las cartas del mazo
        echo "<h2>Cartas restantes en el mazo:</h2>";
        for ($i = 10; $i < count($imagenes); $i++) {
            $rutaCarta = $imagenes[$i];
            echo "<img src='$rutaCarta' alt=''>";
        }
    }
    

    // MÉTODO QUE SACA UNA BAZA DE TRES CARTAS PARA 2-6 JUGADORES
    function variosJugadores() {
       
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Se asegura que el numero de jugadores está en el rango permitido
            $num_jugadores = max(2, min(6, $_POST['num_jugadores']));
        } else {
            // Si no se especifica número, por defecto, son 4 jugadores
            $num_jugadores = 4;
        }
    
        $pagina = new Pages;
        $pagina->render('Menu/variosJugadores');
    
        // Formulario para poner el número de jugadores
        echo "
        <h2>Introduce el número de jugadores:</h2>
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
        echo "<h2>Baraja completa:</h2>";
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
            echo "<h2>Puntuación jugador " . ($j + 1) . ": $puntuacion</h2>";
        }
    
        // Mostrar las imágenes restantes de la baraja
        echo "<h2>Cartas restantes en el mazo:</h2>";
        $cartaInicio = $num_jugadores * 3; 
        for ($i = $cartaInicio; $i < count($imagenes); $i++) {
            $rutaCarta = $imagenes[$i];
            echo "<img src='$rutaCarta' alt=''>";
        }
    }
    
    
    
    
    
}