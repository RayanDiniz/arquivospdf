<?php
include('./login/config.php');
    $avisoPagamentoLogin = {
        $pdo_verifica = $conexao_pdo->prepare('SELECT * FROM pagamentos WHERE status = 0 AND boleto != "null"');
        $pdo_verifica->execute();
        
        while ($fetch = $pdo_verifica->fetch()) {
            $data2 = $fetch['data'];
            $data2 = implode("/", array_reverse(explode("-", $data2)));
            $data1 = date ('d/m/Y');
            // Comparando as Datas
            if (strtotime($data1) > strtotime($data2)) {
                echo '<div class="alert alert-info" role="alert"><strong>Atenção!</strong> Seu boleto está disponível para pagamento, e vence no dia '.$data2.'.</div>';
            }
            if (strtotime($data1) == strtotime($data2)) {
                echo '<div class="alert alert-warning" role="alert"><strong>Atenção!</strong> Seu boleto vence hoje '.$data2.'.</div>';
            }
            if (strtotime($data1) < strtotime($data2)) {
                echo '<div class="alert alert-danger" role="alert"><strong>Atenção!</strong> Seu boleto venceu em '.$data2.', entre em contato com o desenvolvedor.</div>';
            }
        }
    };
?>