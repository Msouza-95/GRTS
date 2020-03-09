<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>GRTS-Autenticação</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">   
    <link rel="stylesheet" href="../css/index.css">

</head>

<body>
    <div>
        <header >
            <div class="index-header">
                
                <h1  >GRTS</h1>
                <h3>Distribuição de Alimentos</h3>
       
                
            </div>
        </header>
        <div class="login-div">
            <form action="../../Controller/controllerLogin.php" method="POST">
                <div class="form-group">
                    <label for="login">Login</label>
                    <input class="form-control" type="text" name="login" id="login" required>
                   
                </div>
                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input class="form-control" type="password" name="senha" id="senha" required>
                
                </div>

                <a><button class="btn btn-info">Login</button></a>
                <a><button class="btn btn-info" type="reset">Cancelar </button></a>

            </form>

        </div>

    </div>



    

    <script type="text/javascript" src="js/materialize.min.js"></script>


</body>

</html>