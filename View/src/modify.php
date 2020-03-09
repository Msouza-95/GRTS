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
    session_start();
    if (isset($_GET['cnpj'])) {
        $cnpj= $_GET['cnpj'];
        $vet = busca($cnpj);
    } else {
        $CNPJ = ($_SESSION['CNPJ']);
        $vet = busca($CNPJ);
        $cnpj = $_SESSION['CNPJ'];
        if ($_SESSION['status'] == 1) {
        }
    }


    ?>


    <div class="add-div" id="add_id">
        <div>
            <h2>Dados Cliente</h2>
            <form class="" action="../../Controller/controllerAlter.php" method="POST">
                <div class="ClietDados">
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="empresa">Nome da Empresa</label>
                            <input type="text" class="form-control" name="empresa" id="empresa" placeholder="Empresa" required value="<?php echo $vet[0][0]; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cnpj">CNPJ</label>
                            <input type="text" class="form-control" id="cnpj" name="cnpj" required value="<?php echo $vet[0][2]; ?>">
                        </div>

                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="resp">Responsável</label>
                            <input type="text" class="form-control" name="resp" id="resp" placeholder="Responsável" required value="<?php echo $vet[0][1]; ?>">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="telefone">Telefone</label>
                            <input type="tel" class="form-control" id="telefone" placeholder="Telefone" name="telefone" required value="<?php echo $vet[0][3]; ?>">
                        </div>
                    </div>
                    <input type="Hidden" id="acao" name="acao" value="AlterarCliente">
                    <input type="hidden" id="idCliente" name="idClient" value="<?php echo $vet[0][2]; ?>">
                </div>

                <div class="button2">
                    <a><button class="btn btn-info">Alterar</button></a>
                </div>
            </form>


            
                    <?PHP enderecos($cnpj); ?>
                        
              

        </div>
        
      
        
        <div class="button2" >
            <a><lbutton id="button1" class="btn btn-info">Novo Endereço</button></a>

        </div>


    </div>
    </div>

    </div>

    <div id="newEnd" class="add-div " style="display:none;">
        <h2>Novo Endereço </h2>
        <form action="../../Controller/controllerAlter.php" method="POST">

            <div class="form-row">

                <div class="form-group col-md-4">
                    <label for="CEP">CEP</label>
                    <input type="text" class="form-control" id="CEP" name="CEP" onblur="pesquisacep(this.value);" maxlength="8" onclick="MascaraCep(CEP);" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="city">Cidade</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="cidade" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="city">Estado</label>
                    <input type="text" class="form-control" id="estado" name="estado" placeholder="UF" required>
                </div>

                <div class="form-group col-md-8">
                    <label for="log">Logradouro</label>
                    <input type="text" class="form-control" id="log" name="log" placeholder="Rua dos Paraiso, nº 0" required>
                </div>

                <div class="form-row">

                    <div class="form-group col-md-4">
                        <label for="comple">Complemento</label>
                        <input type="text" class="form-control" id="comple" name="comple" placeholder="Apartamento, hotel, casa, etc." required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="numero">Numero</label>
                        <input type="text" class="form-control" id="numero" name="numero" required>
                    </div>
                    <input type="hidden" id="acao" name ="acao" value="novo">
                    <input type="hidden" id="cnpj" name ="cnpj"value="<?php echo $cnpj ?>">;
                  

                </div>
                <div class="form-group col-md-6">
                    <a><button class="btn btn-info">Adicionar</button></a>
                </div>
            </div>

        </form>
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