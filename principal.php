<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="tablesorter/sortable.js" type="text/javascript"></script>
    <style>
        table.sortable thead {
            background-color: #eee;
            color: #666666;
            font-weight: bold;
            cursor: default;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <?php
    include("seguranca.php");
    include('ajudantes.php');
    protegePagina();
    $lista_evento = buscarEvento();
    $numEvento = count($lista_evento);
    if ($numEvento == 0) {
        echo "<h3 class='text-success'>Olá " . $_SESSION['usuarioNome'] . ", você não tem eventos cadastrados";
    } elseif ($numEvento == 1) {
        echo "<h3 class='text-success'>Olá " . $_SESSION['usuarioNome'] . ", você tem 1 evento cadastrado";
    } else {
        echo "<h3 class='text-success'>Olá " . $_SESSION['usuarioNome'] . ", você tem $numEvento eventos cadastrados";
    }
    ?>
    <input type="button" class="btn btn-success" onclick="location.href='template_insere.php';" value="Cadastrar novo evento" />
    <input type="button" class="btn btn-danger" onclick="location.href='login.php';" value="Logout!"/>
</div>
<?php include("tabela.php"); ?>
</body>
</html>
