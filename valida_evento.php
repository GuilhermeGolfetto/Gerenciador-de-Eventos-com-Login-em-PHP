<?php
include("ajudantes.php");
include("seguranca.php");
global $_SG;

$_SG['pasta'] = 'anexos/';

$tem_erros = false;
$erros_validacao = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $evento = array();


    //Titulo
    if (isset($_POST['cTitulo']) && strlen($_POST['cTitulo']) > 0) {
        $evento['titulo'] = $_POST['cTitulo'];
    } else {
        $tem_erros = true;
        $erros_validacao['titulo'] = "O Titulo do Evento é Obrigatório!";
    }

    //Descrição
    if (isset($_POST['cDesc'])) {
        $evento['descricao'] = $_POST['cDesc'];
    } else {
        $evento['descricao'] = '';
    }

    //Data e Hora
    if (isset($_POST['cData'])) {
        if (validar_data($_POST['cData'])) {
            $evento['dia'] = $_POST['cData'];
        } else {
            $tem_erros = true;
            $erros_validacao['dia'] = "Parametros invalidos";
        }
    } else {
        $evento['dia'] = "";
    }

    //Imagens
    if ($_FILES['cImagem']['name'] != '') {
        if (tratar_anexo($_FILES['cImagem'])) {
            $nome_final = $_FILES['cImagem']['name'];
            if (move_uploaded_file($_FILES['cImagem']['tmp_name'], $_SG['pasta'] . $nome_final)) {
                $evento['endImagem'] = $_SG['pasta'] . $nome_final;
            } else {
                $tem_erros = true;
                $erros_validacao = 'Erro no upload';
            }
        } else {
            $tem_erros = true;
            $erros_validacao['endImagem'] = "Envie apenas anexos nos formatos .jpeg ou .png";
        }
    } else {
        $evento['endImagem'] = '';
    }

//Status
    $evento['estado'] = $_POST['cStatus'];


    if (!$tem_erros) {
        $donoTabela = $_SESSION['usuarioNome'];
        gravarEvento($donoTabela, $evento);
        header("Location: principal.php "); //
        die();
    } else {
        print_r($erros_validacao);
    }

}