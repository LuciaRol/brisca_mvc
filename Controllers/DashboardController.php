<?php 
namespace Controllers;
use Controllers\FrontController;


Class DashboardController {

    function mostrarDashboard(){
        require_once 'Views\header.php';
        echo "<h2>Este es el Dashboard, que aún está chusco</h2>";
        echo '<iframe width="560" height="315" src="https://www.youtube.com/watch?v=cGUP-6mxHhA" frameborder="0" allowfullscreen></iframe>';
    }
}