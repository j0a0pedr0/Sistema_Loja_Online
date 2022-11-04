<?php 

    include('config.php');
    include('./classes/Site.php'); 
    include('./classes/MySql.php');
    SITE::updateUsuarioOnline(); 
    SITE::contador(); 

    $homeController = new \Controller\HomeController;
    $finalizarController = new \Controller\finalizarController;

    Router::get('/', function() use ($homeController){
       $homeController->index(array('nome'=>'JoãoPedro'));
    });
    Router::get('/finalizar', function() use ($finalizarController){
        $finalizarController->index(array('nome'=>'JoaoPedro'));
    });
    Router::get('?',function($par){
        
    });
    Router::get('?/?',function($par) {
  
    });
    /*
    Router::get('login',function(){
        echo 'login';
    });*/
    



?>