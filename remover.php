<?php
    include("seguranca.php");
    if(removerEvento($_SESSION['usuarioNome'],$_GET['id'])){
        header("Location: principal.php");
    } else{
        echo 'erro';
    }

