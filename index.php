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
    <br>
    <div class=" text-right">
            <input type="button" class="btn btn-primary" onclick="location.href='login.php';" value="Login"/>
    </div>
    <br>
    <?php include("tabelaEventos.php"); ?>
</div>
</body>
</html>
