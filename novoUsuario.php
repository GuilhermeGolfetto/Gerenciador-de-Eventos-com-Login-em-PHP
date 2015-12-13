<!DOCTYPE html>
<html>
<head>
    <title>Novo Usuario</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid text-center">
    <br>
    <fieldset>
        <h2 class="text-success">Cadastro de Usuario</h2>
        <hr>
        <form method="post" action="cadastro.php" role="form">
            <div class="form-group">
                <label for="inNome">Nome
                    <input type="text" class="form-control" name="cNome" id="inNome" maxlength="50" required/><br>
                </label>
            </div>
            <div class="form-group">
                <label for="inUser">Usuario:
                    <input type="text" class="form-control" name="cUsuario" id="inUser" maxlength="50" required/><br>
                </label>
            </div>
            <div class="form-group">
                <label for="inPass">Senha:
                    <input type="password" name="cSenha" class="form-control" id="inPass" maxlength="30" required/><br>
                </label>
            </div>
            <input type="submit" class="btn btn-success" onclick="alert('Usuario cadastrado com Sucesso!');" value="Cadastrar"/> <br>
            <br><input type="button" class="btn btn-danger" onclick="location.href='login.php';" value="Voltar ao Login"/>
        </form>

    </fieldset>
</div>
</body>
</html>
