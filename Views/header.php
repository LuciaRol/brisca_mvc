
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1><a href="<?=BASE_URL?>index.php">Bienvenido al casino de Bender, el que Ofende</a></h1>
    <nav>
        <ul>
            <li><a href="<?=BASE_URL?>index.php?controller=Baraja&action=mostrarBaraja">Mostrar baraja</a></li>
            <li><a href="<?=BASE_URL?>index.php?controller=Baraja&action=barajar">Barajar el mazo</a></li>
            <li><a href="<?=BASE_URL?>index.php?controller=Carta&action=mostrarCarta">Mostrar una carta</a></li>
            <li><a href="<?=BASE_URL?>index.php?controller=Carta&action=sacarUltimaCarta">Sacar la última carta del mazo</a></li>
            <li><a href="<?=BASE_URL?>index.php?controller=Carta&action=tresCartas">Repartir tres cartas a un jugador</a></li>
            <li><a href="<?=BASE_URL?>index.php?controller=Carta&action=diezCartas">Repartir diez cartas a un jugador</a></li>
            <li><a href="<?=BASE_URL?>index.php?controller=Carta&action=variosJugadores">Elegir número de jugadores</a></li>
        </ul>
    </nav>
    
</body>
</html>