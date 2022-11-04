<?php

    namespace Controller;
    use \views\mainViews;
    Class HomeController
    {
        public function index($data){
            if(isset($_GET['addCart'])){
                $idProduto = (int)$_GET['addCart'];
                if(isset($_SESSION['carrinho']) == false){
                    $_SESSION['carrinho'] = array();   
                }

                if(isset($_SESSION['carrinho'][$idProduto]) == false){
                    $_SESSION['carrinho'][$idProduto] = 1;
                }else{
                    $_SESSION['carrinho'][$idProduto]++;
                }
                \Painel::redirect(INCLUDE_PATH);
            }


            mainViews::render('home.php',$data);
        }
    }


?>