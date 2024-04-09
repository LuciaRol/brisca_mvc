<?php

spl_autoload_register(function ($clase) {
    $directorio_clase = str_replace('\\', '/', $clase);
    $archivo_clase = $directorio_clase . '.php';

    if (file_exists($archivo_clase)) {
        require_once $archivo_clase;
    }
});