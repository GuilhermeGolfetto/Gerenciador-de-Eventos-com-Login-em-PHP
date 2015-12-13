<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Evento</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        function formatar(mascara, documento) {
            var i = documento.value.length;
            var saida = mascara.substring(0, 1);
            var texto = mascara.substring(i);

            if (texto.substring(0, 1) != saida) {
                documento.value += texto.substring(0, 1);
            }
        }
    </script>
</head>
<body>
<div class="container-fluid">
    <br>
    <form method="POST" action="valida_evento.php" enctype="multipart/form-data" role="form">
        <fieldset>
            <!--Titulo-->
            <h2 class="text-success text-center">Novo Evento</h2>
            <hr>
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="cTitulo" id="titulo" class="form-control" required/>
            </div>
            <!--Descrição-->
            <div class="form-group">
                <label for="desc">Descrição</label>
                <textarea name="cDesc" id="desc" class="form-control"></textarea>
            </div>
            <!--Data e Hora-->

            <label for="data">Data/Hora</label>
            <input type="text" name="cData" id="data" class="form-control" required
                   OnKeyPress="formatar('##/##/####-##:##', this)"
                   placeholder="dd/mm/aaaa-hh:mm"/>

            <br>
            <!--Status-->
            <h4 class="text-success">Estado</h4>
            <hr>
            <label><input type="radio" name="cStatus" class="radios" value="Rascunho" checked/>Rascunho</label>
            <label><input type="radio" name="cStatus" class="radios" value="Publicado"/>Publicado</label><br>

            <!--Imagem-->
            <h4 class="text-success">Imagem</h4>
            <hr>
            <input type="file" name="cImagem" id="imagem"/>
            <br>
            <br>
            <!--submit-->
            <button type="submit" class="btn btn-success">Cadastrar</button>
            <button type="reset" class="btn btn-default">Reset</button>
            <input type="button" onClick="history.back()" value="Voltar" class="btn btn-warning"/>
            <br>
        </fieldset>
    </form>
</div>
</body>
</html>
