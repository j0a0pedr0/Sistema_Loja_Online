<div class="chamada-escolher">
    <div class="center">
        <h2 class="w100">Escolha seus produtos e compre agora!</h2>
       
    </div><!--center-->
</div><!--chamada-escolher-->

<div class="lista-items">
    <div class="center">
        <?php
            $items = \Models\homeModel::getLojaItems();

            foreach($items as $key => $value){
                $imgs = \Mysql::conectar()->prepare("SELECT imagem FROM `tb_admin.estoque_imagens` WHERE produto_id = ? LIMIT 1");
                $imgs->execute(array($value['id']));
                $img = $imgs->fetch()['imagem'];
                
        ?>
        <div class="produto-single-box">
            <div class="single-wrap">
                <div class="img-produto w100" style="background-image:url('painel/uploads/<?php echo $img; ?>')"></div><!--img-produto-->
                <div class="info-produto">
                    <p>Nome:<?php echo $value['nome']; ?></p>
                    <p>Preço:R$<?php echo \Painel::convertMoney($value['preco']); ?></p>
                    <a class="add-carrinho" href="<?php echo INCLUDE_PATH ?>?addCart=<?php echo $value['id']; ?>">Adicionar ao carrinho!</a>
                </div><!--info-produto-->
            </div><!--single-wrap-->
        </div><!--produto-single-box-->
        <?php } ?>
    </div><!--center-->
</div><!--lista-items-->