<?php

// Dados da cobrança (substitua com dados reais)
$dados_cobranca = array(
    'valor' => 100.00,
    'chave' => 'chave_pix_destinatario',
    // outros detalhes da cobrança, dependendo da API do PicPay
);

// URL e endpoint para criar uma cobrança Pix no PicPay
$url_api_picpay = 'https://appws.picpay.com/ecommerce/public/payments';
$token_autenticacao = 'seu_token_de_autenticacao';

// Montando a requisição
$ch = curl_init($url_api_picpay);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'x-picpay-token: ' . $token_autenticacao,
));
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dados_cobranca));

// Fazendo a requisição POST
$resposta = curl_exec($ch);

// Verificando se houve algum erro
if ($resposta === false) {
    echo 'Erro na requisição: ' . curl_error($ch);
} else {
    // Tratar a resposta da API
    var_dump(json_decode($resposta, true)); // ou outra forma de processar a resposta
}

// Fechando a conexão cURL
curl_close($ch);
?>
