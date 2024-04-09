<?php

namespace Models;

// Importa la clase Carta
use Models\Carta;

class Baraja {
    private array $baraja;

    public function __construct() {
        $this->baraja = []; // Inicializa el array de la baraja
        
        // Array que contiene los palos de las cartas 
        $palos = Carta::PALOS;

        // Genera la baraja iterando sobre los palos y los valores de las cartas
        foreach ($palos as $palo) {
            for ($valor = 1; $valor <= 12; $valor++) {
                $carta = new Carta($valor, $palo); // Crea una nueva instancia de carta
                $this->baraja[] = $carta; // Añade la carta a la baraja
            }
        }

    }

    // getters y setters
    public function getBaraja(): array {
        return $this->baraja;
    }

    public function setBaraja(array $baraja): void {
        $this->baraja = $baraja;
    }

    //barajar el mazo 
    public function barajarMazo(){
        shuffle($this->baraja);
    }

    // extraer una carta de la baraja (tiene que descontarse del total del mazo)
    public function extraerCarta(){
        return array_pop($this->baraja);
    }
}
?>


// barajar carta
// extraer una carta (con array_pop)


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    /* require_once '../autoloader.php';
    require_once '../Config/Config.php'; */

        $baraja = new Baraja();
        $baraja->barajarMazo();
        $cartaExtraida = $baraja->extraerCarta();
        
        if ($cartaExtraida !== null) {
            // La carta fue extraída exitosamente, puedes usarla aquí
            echo "<img src='" . $cartaExtraida->getImagenUrl() . "' alt='Carta extraída'>";
        } else {
            // El mazo está vacío, maneja esta situación según sea necesario
            echo "El mazo está vacío. No quedan más cartas para extraer.";
        }
        
        // Mostrar las cartas restantes en la baraja
        echo "<p>Cartas restantes en la baraja:</p>";
        foreach ($baraja->getBaraja() as $carta) {
            echo "<img src='" . $carta->getImagenUrl() . "' alt='Carta en la baraja'>";
        }
    ?>
</body>
</html>
