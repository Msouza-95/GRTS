<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Modify</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
    

</head>

<body>

    <header class="main-header">
        <nav class="nav nav-pills nav-fill">
            <a class="nav-item nav-link " href="main.php">listagem</a>
            <a class="nav-item nav-link" href="register.php">registrar</a>
            <a class="nav-item nav-link" href="update.php">Update</a>
            <a class="nav-item nav-link  justify-content-end" href="index.php">Sign out</a>

        </nav>

    </header>

    <?php
    require_once "../..//Controller/support/support.php";

    $vet = busca($_GET['cnpj']);

    ?>


    <div class="add-div" id="alter_id">
        <h2>Alterar Dados do Cliente</h2>
        <form action="../../controller/controllerAlter.php" method="POST">
            <div class="form-group">
                <label for="empresa">Nome da Empresa</label>
                <input type="text" class="form-control" name="nome" id="empresa" value="<?php echo $vet[0][0]; ?>">
            </div>
            <div class="form-group">
                <label for="resp">Responsável</label>
                <input type="text" class="form-control" name="resp" id="resp" value="<?php echo $vet[0][1]; ?>">
            </div>
            <div class="form-group">
                <label for="cnpj">CNPJ</label>
                <input type="text" class="form-control" id="cnpj" name="cnpj" value="<?php echo $vet[0][2]; ?>">
            </div>
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="tel" class="form-control" id="telefone" placeholder="Telefone" name="telefone" value="<?php echo $vet[0][3]; ?>">
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="CEP">CEP</label>
                    <input type="text" class="form-control" id="CEP" name="CEP" value="<?php echo $vet[0][5]; ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="city">Cidade</label>
                    <input type="text" class="form-control" id="city" name="city" value="<?php echo $vet[0][8]; ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="city">Estado</label>
                    <input type="text" class="form-control" id="estado" name="estado" value="<?php echo $vet[0][9]; ?>">
                </div>

                <div class="form-group col-md-2">
                    <label for="numero">Numero</label>
                    <input type="text" class="form-control" id="numero" name="numero" value="<?php echo $vet[0][4]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="log">Logradouro</label>
                <input type="text" class="form-control" id="log" name="log" value="<?php echo $vet[0][7]; ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="comple">Complemento</label>
                <input type="text" class="form-control" id="comple" name="comple" value="<?php echo $vet[0][6]; ?>">
            </div>
            <input type="hidden" id="velho" name="velho" value="<?php echo $vet[0][2]; ?>">
            <div class="button2">
            <a><button class="btn btn-info">Alterar</button></a>
            </div>
            
                
        </form>
    </div>

    <footer style="margin-top: 15%"></footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <font></font>

    <script src="../script/renderer.js"></script>
    <script src="../script/hides.js"> </script>

</body>

</html>