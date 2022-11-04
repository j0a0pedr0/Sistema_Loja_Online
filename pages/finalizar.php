<div class="chamada-escolher">
    <div class="center">
        <h2 class="w100">Finalizando o seu pedido!</h2>
    </div><!--center-->
</div><!--chamada-escolher-->
<div class="tabela-pedidos">
    <div class="center">
        <h2 class="w100"><i class="fa-solid fa-cart-shopping"></i>Carrinho</h2>
        <table>
            <tr>
                <td>Nome do produto</td>
                <td>Quantidade</td>
                <td>Valor</td>
            </tr>
            <?php
                $itemsCarrinho = $_SESSION['carrinho'];
                $total = 0;
                foreach($itemsCarrinho as $key => $value){
                    if($key == 'idProduto')
                        continue;
                    $idProduto = $key;
                    $produto = \Mysql::conectar()->prepare("SELECT * FROM `tb_admin.estoque` WHERE id=?");
                    $produto->execute(array($idProduto));
                    $produto = $produto->fetch();
                    $valor = $value*$produto['preco'];
                    $total+=$valor;
            ?>
            <tr>
                <td><?php echo $produto['nome'] ?></td>
                <td><?php echo $value; ?></td>
                <td>R$ <?php echo \Painel::convertMoney($valor); ?></td>
            </tr>
            <?php } ?>

        </table>
    </div><!--center-->
</div><!--tabela-pedidos-->
<div class="finalizar-pedido">
    <div class="center">
        <p class="w100"><a class="btn-pagamento" href="">Finalizar Pedido!</a></p>
        <h3>Total: R$<?php echo \Painel::convertMoney($total); ?></h3>
    </div><!--center-->
</div><!--finalizar-pedido-->