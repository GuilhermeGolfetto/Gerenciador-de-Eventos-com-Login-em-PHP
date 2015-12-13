<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

</head>
<body>
<div class="container text-center">
    <br>
    <form method="post" action="valida.php" role="form">
        <fieldset>
            <h2 class="text-success">Acesso</h2>
            <hr>
            <div class="form-group">
                <p><b>Usuario:</b></p>
                <label for="inUser">
                    <input type="text" name="cUsuario" class="form-control" id="inUser" required/><br>
                </label>
            </div>
            <div class="form-group">
                <p><b>Senha:</b></p>
                <label for="inPass">
                    <input type="password" name="cSenha" class="form-control" id="inPass" width="48" required/><br>
                </label>
            </div>
            <input type="submit" value="Acessar" class="btn btn-primary"/>
            <br><br>
            <input type="button" class="btn btn-default" onclick="location.href='novoUsuario.php';" id="link-cad"
                   value="Cadasto"/><br><br>
            <input type="button" class="btn" onclick="location.href='index.php';" id="link-cad"
                   value="Lista de Eventos"/>
        </fieldset>
    </form>
</div>
</body>
</html>
