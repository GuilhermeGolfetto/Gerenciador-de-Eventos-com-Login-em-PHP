<?php
require_once("seguranca.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = (isset($_POST['cNome'])) ?$_POST['cNome'] : '';
    $usuario = (isset($_POST['cUsuario'])) ? $_POST['cUsuario'] : '';
    $senha = (isset($_POST['cSenha'])) ? $_POST['cSenha'] : '';

    cadastrarUsuario($nome, $usuario, $senha);
}

?>