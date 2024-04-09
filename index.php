<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brisca en MVC</title>
</head>
<body>
    <?php
        require_once 'Views\header.php';
        require_once 'autoloader.php';
        require_once 'Config/Config.php';

        use Controllers\FrontController;
        FrontController::main();
    ?>
    

</body>
</html>