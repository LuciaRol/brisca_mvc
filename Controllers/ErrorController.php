<?php
namespace Controllers;

class ErrorController{
    public static function show_error404():string{
        return "<h3>Error 404. Página no encontrada</h3>";
    }
}