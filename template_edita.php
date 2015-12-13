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
</head>
<body>
<div class="container-fluid">
    <br>
    <form method="POST" enctype="multipart/form-data">
        <fieldset>
            <!--Titulo-->
            <h2 class="text-success text-center">Editar evento</h2>
            <hr>
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="cTitulo" class="form-control" id="titulo" value="<?php echo $evento['titulo']; ?>" required/>
            </div>

            <!--Descrição-->
            <div class="form-group"><label for="desc">Descrição</label>
            <textarea name="cDesc" id="desc" class="form-control"><?php echo $evento['descricao']; ?></textarea></div>


            <!--Data e Hora-->
            <label for="data">Data/Hora</label>
            <input type="text" name="cData" id="data" required value="<?php echo $evento['dia']; ?>" class="form-control"/>
            <br>
            <!--Status-->
            <h4 class="text-success">Estado</h4>
            <hr>
            <label><input type="radio" name="cStatus" class="radios"
                          value="Rascunho" <?php echo ($evento['estado'] == "Rascunho") ? "checked" : ''; ?> class="form-control"/>Rascunho</label>
            <label><input type="radio" name="cStatus" class="radios"
                          value="Publicado" <?php echo ($evento['estado'] == "Publicado") ? "checked" : ''; ?> class="form-control"/>Publicado</label><br>

            <!--Imagem-->

            <h4 class="text-success">Imagem</h4>
            <hr>
            <input type="file" name="cImagem" id="imagem"
                   onclick="return confirm('A imagem antes inserida será deletada, deseja continuar?')"/>
            <br>
            <br>
            <!--submit-->
            <button type="submit" id="btnSubir" class="btn btn-success">Editar</button>
            <input type="button" onClick="history.back()" value="Voltar" class="btn btn-warning"/>
            <br>
        </fieldset>
    </form>
    <div>
</body>
</html>
