<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/style.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>fontawesome-free-6.1.1-web/css/all.css">
    <title>Loja Virtual</title>
</head>
<body>
<base base="<?php echo INCLUDE_PATH; ?>" />
<header>
    <div class="center">
        <div class="logo"><a href="<?php echo INCLUDE_PATH; ?>">CleoModas</a></div>

        <nav>
            <ul>
                <li><a href="javascript:void(0);"><i class="fa-solid fa-cart-shopping"></i>Carrinho(<?php echo \Models\homeModel::getTotalItemsCarrinho(); ?>)</a></li>
                <li><a href="<?php echo INCLUDE_PATH; ?>finalizar" class="finalizar-pedido">Finalizar Pedido</a></li>
            </ul>
        </nav>
    </div><!--center-->
</header>
    
