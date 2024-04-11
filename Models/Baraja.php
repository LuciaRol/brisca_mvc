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
                // Genera la ruta de la imagen
                $imagen = "img/$palo" . "_" . "$valor.jpg";
                // Añade la ruta de la imagen a la baraja
                $this->baraja[] = $imagen;                
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


