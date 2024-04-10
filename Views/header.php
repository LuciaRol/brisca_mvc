<?php

require_once 'autoloader.php';
require_once 'Config/Config.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Bienvenido al casino de Bender, el que Ofende</h1>
    <nav>
        <ul>
            <li><a href="<?=BASE_URL?>index.php?controller=Baraja&action=mostrarBaraja">Mostrar baraja</a></li>
            <li><a href="<?=BASE_URL?>index.php?controller=Baraja&action=barajar">Barajar el mazo</a></li>
            <li><a href="<?=BASE_URL?>index.php?controller=Carta&action=mostrarCarta">Mostrar una carta</a></li>
            <li><a href="">Sacar la última carta del mazo</a></li>
            <li><a href="">Repartir tres cartas a un jugador</a></li>
            <li><a href="">Repartir diez cartas a un jugador</a></li>
            <li><a href="">Elegir numero de jugadores</a></li>
        </ul>
    </nav>
    
</body>
</html>