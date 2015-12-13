<?php

function tratar_anexo($anexo){
    if ($anexo == '') {
        return true;
    } else {
        $padrao = '/^.+(\.jpeg|\.png)$/';
        $resultado = preg_match($padrao, $anexo['name']);
        if (!$resultado) {
            return false;
        } else {
            return true;
        }
    }
}

function validar_data($data){
    $padrao = '/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}\-[0-9]{1,2}\:[0-9]{2}$/';
    $resultado = preg_match($padrao, $data);
    if (!$resultado) {
        return false;
    }
    $dadosTotal = explode('-', $data);
    $dadosData = $dadosTotal[0];
    $dados = explode('/', $dadosData);
    $dia = $dados[0];
    $mes = $dados[1];
    $ano = $dados[2];
    $resultado = checkdate($mes, $dia, $ano);
    return $resultado;
}