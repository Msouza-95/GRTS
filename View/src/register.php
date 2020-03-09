<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">


</head>

<body>
    <header class="main-header">
        <nav class="nav nav-pills nav-fill">
            <a class="nav-item nav-link " href="main.php">listagem</a>
            <a class="nav-item nav-link active" href="#">Registar</a>
            <a class="nav-item nav-link" href="update.php">Update</a>
            <a class="nav-item nav-link  justify-content-end" href="index.php">Sign out</a>

        </nav>


    </header>




    <div>
        <div class="add-div" id="add_id" container>
            <h2>Adicionar Novo cliente</h2>
            <form name="form1" class="" action="../../Controller/controllerCadastro.php" method="POST">

                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="empresa">Nome da Empresa</label>
                        <input type="text" class="form-control" name="empresa" id="empresa" placeholder="Empresa" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="cnpj">CNPJ</label>
                        <input type="text" class="form-control" id="cnpj" name="cnpj" maxlength="18" required " 
maxlength="18" onBlur="ValidarCNPJ(form1.cnpj);">
                    </div>

                </div>


                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="resp">Responsável</label>
                        <input type="text" class="form-control" name="resp" id="resp" placeholder="Responsável" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="telefone">Telefone</label>
                        <input type="tel" class="form-control" id="telefone" placeholder="Telefone" name="telefone" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="CEP">CEP</label>
                        <input type="text" class="form-control" id="CEP" name="CEP" onblur="pesquisacep(this.value);" maxlength="8" onclick="MascaraCep(CEP);" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="bairro">Bairro</label>
                        <input type="text" class="form-control" id="bairro" name="bairro" placeholder= "Bairro" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="city">Cidade</label>
                        <input type="text" class="form-control" id="city" name="city"  placeholder= "cidade" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="city">Estado</label>
                        <input type="text" class="form-control" id="estado" name="estado"  placeholder= "UF"required>
                    </div>
                    

                        <div class="form-group col-md-8">
                            <label for="log">Logradouro</label>
                            <input type="text" class="form-control" id="log" name="log" placeholder="Rua dos Paraiso, nº 0" required>
                        </div>
                        
                    
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

                </div>
                
                <center><a><button class="btn btn-info">Cadastrar</button></a></center>


            </form>
        </div>
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