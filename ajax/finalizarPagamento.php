<?php
    include('../includeConstants.php');
    $data['token'] = 'F1735F1D2F7640DC9919FCE94846976A';
    $data['email'] = 'joaopedrobarreto1000@gmail.com';
    $data['currency'] = 'BRL';
    $data['notificationURL'] = 'http://localhost/criando_site_dinamico_lojavirtual/retorno.php';
    $data['reference'] = uniqid();
    $index = 1;
    $itemsCarrinho = $_SESSION['carrinho'];
    foreach($itemsCarrinho as $key => $value){
        if($key == 'idProduto')
            continue;
        $idProduto = $key;
        $produto = \Mysql::conectar()->prepare("SELECT * FROM `tb_admin.estoque` WHERE id=?");
        $produto->execute(array($idProduto));
        $produto = $produto->fetch();
        $valor = $value*$produto['preco'];
        $data["itemId$index"] = $index;
        $data["itemQuantity$index"] = $value;
        $data["itemDescription$index"] = $produto['nome'];
        $data["itemAmount$index"] = number_format($produto['preco'], 2,'.','');
        //$total+=$valor;
        $index++;
        $sql = \Mysql::conectar()->prepare("INSERT INTO `tb_admin.pedidos` VALUES (null,?,?,?,?)");
        $sql->execute(array($data['reference'],$produto['id'],$value,'pendente'));
    }

    $url = "https://ws.sandbox.pagseguro.uol.com.br/v2/checkout";
    $data = http_build_query($data);

    $curl = curl_init($url);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl,CURLOPT_POST,true);
    curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
    curl_setopt($curl,CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_1);
    $xml = curl_exec($curl);
    
    curl_close($curl);
    $xml = simplexml_load_string($xml);

    echo $xml->code;

    $_SESSION['carrinho'] = array();
?>