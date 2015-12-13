<?php
require_once("seguranca.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = (isset($_POST['cUsuario'])) ? $_POST['cUsuario'] : '';
    $senha = (isset($_POST['cSenha'])) ? $_POST['cSenha'] : '';
    if (validaUsuario($usuario, $senha) == true) {
        header("Location: principal.php");
    } else {
        expulsaVisitante();
    }
}