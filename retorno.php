<?php
    include('includeConstants.php');
    if(isset($_POST['notificationType']) && $_POST['notificationType'] == 'transaction'){
        
        $email = 'joaopedrobarreto1000@gmail.com';
        $token = 'F1735F1D2F7640DC9919FCE94846976A';

        $url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/notifications/' . $_POST['notificationCode'].'?email='. $email.'&token='.$token;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        $transaction = curl_exec($curl);
        curl_close($curl);

        if($transaction == 'Unauthorized'){
            die('Um erro ocorreu!');
        }

        $transaction = simplexml_load_string($transaction);
        $transactionStatus = $transaction->status;
        if($transactionStatus == 1){
            $transactionStatus = 'Aguardando pagamento';
        }else if($transactionStatus == 1){
            $transactionStatus = 'Em análise';
        }else if($transactionStatus == 3){
            $transactionStatus = 'Paga';
            $reference_id = $transaction->reference;
            \MySql::conectar()->exec("UPDATE `tb_admin.pedidos` SET status = 'pago' WHERE reference_id = '$reference_id'");
        }else if($transactionStatus == 4){
            $transactionStatus = 'Disponível';
        }else if($transactionStatus == 5){
            $transactionStatus = 'Em Disputa';
        }else if($transactionStatus == 6){
            $transactionStatus = 'Devolvida';
        }else if($transactionStatus == 7){
            $transactionStatus = 'Cancelada';
        }
    }

?>