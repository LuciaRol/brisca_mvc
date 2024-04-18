<?php 
namespace Controllers;
use Controllers\FrontController;
use Lib\Pages;




class DashboardController {

    function mostrarDashboard(){
        $pagina = new Pages;
        $pagina->render('header');
        echo "<div style='text-align: center; margin-top: 2rem;'>"; 
            echo "<img class='img-index' width='820' height='480' src='./img/otros/bender.jpg'></img>";
        echo "</div>"; 
    }
}
