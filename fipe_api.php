<?php

require_once 'config.php';

function fazerRequisicao($url) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    if($response === false) {
        throw new Exception("Erro ao fazer a requisição: " . curl_error($curl));
    }
    curl_close($curl);
    return json_decode($response, true);
}

function listarMarcas($tipoVeiculo) {
    try {
        $url = API_BASE_URL . "/{$tipoVeiculo}/marcas";
        return fazerRequisicao($url);
    } catch (Exception $e) {
        // Log de erro ou manipulação de erro
        return null;
    }
}

// Outras funções aqui...

?>
