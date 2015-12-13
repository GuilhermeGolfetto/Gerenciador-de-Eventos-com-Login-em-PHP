<?php

$_SG['conectaServidor'] = true;
$_SG['abreSessao'] = true;
$_SG['caseSensitive'] = false;
$_SG['validaSempre'] = true;
$_SG['servidor'] = 'localhost';
$_SG['usuario'] = 'root';
$_SG['senha'] = 'root';
$_SG['banco'] = 'testenoweb';
$_SG['paginaLogin'] = 'login.php';
$_SG['tabela'] = 'usuarios';

if ($_SG['conectaServidor'] == true) {
    $_SG['conexao'] = mysqli_connect($_SG['servidor'], $_SG['usuario'], $_SG['senha'], $_SG['banco']);
}
if ($_SG['abreSessao'] == true)
    session_start();

function validaUsuario($usuario, $senha)
{
    global $_SG;
    $sql = "SELECT * FROM usuarios WHERE usuario = '{$usuario}' AND senha = '{$senha}'";
    $query = mysqli_query($_SG['conexao'], $sql);
    $resultado = mysqli_fetch_assoc($query);
    if (empty($resultado)) {
        return false;
    } else {
        $_SESSION['usuarioID'] = $resultado['id'];
        $_SESSION['usuarioNome'] = $resultado['nome'];
        if ($_SG['validaSempre'] == true) {
            $_SESSION['usuarioLogin'] = $usuario;
            $_SESSION['usuarioSenha'] = $senha;
        }
        return true;
    }
}

function protegePagina(){
    global $_SG;
    if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])) {
        expulsaVisitante();
    } else if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])) {
        if ($_SG['validaSempre'] == true) {
            if (!validaUsuario($_SESSION['usuarioLogin'], $_SESSION['usuarioSenha'])) {
                expulsaVisitante();
            }
        }
    }
}

function expulsaVisitante(){
    global $_SG;
    unset($_SESSION['usuarioID'], $_SESSION['usuarioNome'], $_SESSION['usuarioLogin'], $_SESSION['usuarioSenha']);
    header("Location: " . $_SG['paginaLogin']);
}

function cadastrarUsuario($nome, $usuario, $senha){
    global $_SG;
    $sql = "INSERT INTO usuarios (nome,usuario,senha) VALUES ('$nome','$usuario','$senha')";
    if (mysqli_query($_SG['conexao'], $sql) == true && criarTabela($nome) == true) {
        header("Location: login.php");
    } else {
        echo "erro ao criar usuario";
    }
}

function criarTabela($nome){
    global $_SG;
    $sql = "CREATE TABLE IF NOT EXISTS " . $nome . "_registros
    (
        id int(10) unsigned not null auto_increment,
        titulo varchar(100) not null,
        descricao varchar(255),
        dia varchar(25),
        endImagem VARCHAR(255),
        estado VARCHAR(50),
        primary key (id)
    )";
    if (mysqli_query($_SG['conexao'], $sql) == true) {
        return true;
    } else {
        return false;
    }
}

function gravarEvento($dono, $evento){
    global $_SG;
    $sql = "INSERT INTO " . $dono . "_registros
     (titulo,descricao,dia,endImagem,estado) VALUES
     ('{$evento['titulo']}','{$evento['descricao']}','{$evento['dia']}','{$evento['endImagem']}','{$evento['estado']}');";
    mysqli_query($_SG['conexao'], $sql);
}

function buscarEvento(){
    global $_SG;
    $sql = 'SELECT * FROM ' . $_SESSION['usuarioNome'] . "_registros";
    $resultado = mysqli_query($_SG['conexao'], $sql);
    $eventos = array();

    for ($i = 0; $evento = mysqli_fetch_assoc($resultado); $i++) {
        $eventos[$i] = $evento;
    }
    return $eventos;
}

function buscarEventosPorDono($dono){
    global $_SG;
    $sql = 'SELECT * FROM ' . $dono . "_registros";
    $resultado = mysqli_query($_SG['conexao'], $sql);
    $eventos = array();

    for ($i = 0; $evento = mysqli_fetch_assoc($resultado); $i++) {
        $eventos[$i] = $evento;
    }
    return $eventos;
}

function buscarUsuarios(){
    global $_SG;
    $sql = "SELECT nome FROM usuarios";
    $resultado = mysqli_query($_SG['conexao'], $sql);
    $usuarios = array();

    for ($i = 0; $usuario = mysqli_fetch_assoc($resultado); $i++) {
        $usuarios[$i] = $usuario;
    }
    return $usuarios;
}

function buscarTabelas($donos){
    $conteudos = array();
    for($i = 0; $i < count($donos) ; $i++){
        $conteudos[$i] = buscarEventosPorDono($donos[$i]['nome']);
    }
    return $conteudos;
}

function buscarEventoPorID($id){
    global $_SG;
    $sql = "SELECT * FROM " . $_SESSION['usuarioNome'] . "_registros WHERE id = " . $id;
    $resultado = mysqli_query($_SG['conexao'], $sql);
    return mysqli_fetch_assoc($resultado);
}

function editarEvento($dono, $evento, $id){
    global $_SG;
    $sql = "UPDATE " . $dono . "_registros SET titulo = '{$evento['titulo']}', descricao = '{$evento['descricao']}',dia = '{$evento['dia']}',endImagem = '{$evento['endImagem']}',estado = '{$evento['estado']}' where id = '{$id}';";
    if (mysqli_query($_SG['conexao'], $sql)) {
        return true;
    } else {
        return false;
    }
}

function removerEvento($dono, $id){
    global $_SG;
    $sql = "DELETE FROM {$dono}_registros WHERE id = {$id}";
    if (mysqli_query($_SG['conexao'], $sql)) {
        return true;
    } else {
        return false;
    }
}

function listarEvento(){
    global $_SG;
    $listaEvento = array();
    $listaEvento = buscarEvento();
    print_r($listaEvento);
}

