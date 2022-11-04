<?php
    namespace Controller;
    use \Views\mainViews;
    class finalizarController
    {

        public function index($data){


            mainViews::render('finalizar.php',$data);
        }
    }
?>