<?php

namespace Models;

class Carta{
    // Creamos las constantes de los palos y las cartas.
    const PALOS = ["oros", "copas", "espadas", "bastos"];
    const CARTAS = [1=>"as", 2=>"2", 3=>"3", 4=>"4", 5=>"5", 6=>"6", 7=>"7", 8=>"8", 9=>"9", 10=>"sota", 11=>"caballo", 12=>"rey"];

    // Creamos las propiedades de la clase.
    public function __construct(
        private int $numero,
        private string $palo
        ){    
    }

    // getters y setters
    public function getNumero(){
        return $this->numero;
    }

   
    public function setNumero($numero){
        $this->numero = $numero;
        return $this;
    }

   
    public function getPalo(){
        return $this->palo;
    }

    
    public function setPalo($palo){
        $this->palo = $palo;
        return $this;
    }

    PUBLIC FUNCTION __toString(){
        $num = SELF::CARTAS[$this->numero];
        return $num . " de " . $this->palo;
    }

    // Al ser un array asociativo, no podemos usar in_array, sino array_key_exists. Ya que in_array solo funciona con arrays indexados.
    public static function comprobarNumero($numero) :bool{
        return array_key_exists(strtoupper($numero), self::CARTAS); 
    }

    public static function generarCartaAleatoria(): Carta {
        $numero = rand(1, 12); // genera numero aleatorio

        $palo = self::PALOS[array_rand(self::PALOS)];
        return new Carta($numero, $palo);
    }

    // Comprobamos si existe el palo y esta en el array PALOS
    public static function comprobarPalo($palo) : bool{
        return in_array($palo, self::PALOS);
    }

}








