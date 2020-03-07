<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Update</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
    <header class="main-header">
        <nav class="nav nav-pills nav-fill">
            <a class="nav-item nav-link " href="main.php">Listagem</a>
            <a class="nav-item nav-link" href="register.php">Registar</a>
            <a class="nav-item nav-link active" href="#">Update</a>
            <a class="nav-item nav-link  justify-content-end" href="index.php">Sign out</a>

        </nav>

        <h1>GRTS</h1>
    </header>


    <div class="container">

        <div class="update-div" id="update_id">
            <h2>Update cliente</h2>
            <table id="table_id_delete" class="display">
                <thead>
                    <tr></tr>
                    <th>Empresa</th>
                    <th>cnpj</th>
                    <th>Responsável</th>
                    <th>Ação</th>
                    <th>Ação</th>

                    </tr>
                </thead>
                <tbody>
                    <?php require_once "../../Controller/support/support.php";

                    genericTable(2); ?>

                    </tfoot>
            </table>
        </div>
    </div>




    <footer style="margin-top: 15%"></footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <font></font>

    <script src="../script/renderer.js"></script>
    <script src="../script/hides.js"> </script>
    <script src="../script/complete.js"> </script>

</body>

</html>