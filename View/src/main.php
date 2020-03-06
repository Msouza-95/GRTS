<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Main</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css"href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    
</head>
<body>
    <header class="main-header">
        <div class="nav ">
            <nav class="nav nav-pills flex-column flex-sm-row">
                <a class="nav-item nav-link active" href="#"  id="listagem">Listagem</a>
                <a class="nav-item nav-link active " href="#" id="adicionar">Adicionar</a>
                <a class="nav-item nav-link active" href="#" id="update">Alterar/Delete</a>
                <a style=" class="nav-item nav-link active" href="./index.php">vazar</a>
                
    
            </nav>
        </div>
        <h1>GRTS</h1>
    </header>
   

    <div class="table-div" id="table_id_div">
        <table id="table_id" class="display" >
            <thead>
                <tr></tr>
                    <th>Empresa</th>
                    <th>Responsavél</th>
                    <th>Cnpj</th>
                    <th>Telefone</th>
                    <th>Lagradouro</th>
                    <th>Complemento</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>$320,800</td>
                </tr>
                <tr>
                    <td>Garrett Winters</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>63</td>
                    <td>2011/07/25</td>
                    <td>$170,750</td>
                </tr>
                <tr>
                    <td>Ashton Cox</td>
                    <td>Junior Technical Author</td>
                    <td>San Francisco</td>
                    <td>66</td>
                    <td>2009/01/12</td>
                    <td>$86,000</td>
                </tr>
                <tr>
                    <td>Cedric Kelly</td>
                    <td>Senior Javascript Developer</td>
                    <td>Edinburgh</td>
                    <td>22</td>
                    <td>2012/03/29</td>
                    <td>$433,060</td>
                </tr>
                <tr>
                    <td>Airi Satou</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>33</td>
                    <td>2008/11/28</td>
                    <td>$162,700</td>
                </tr>

                <tr>
                    <td>Aaaaaaairi Satou</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>33</td>
                    <td>2008/11/28</td>
                    <td>$162,700</td>
                </tr>
                

            </tfoot>
        </table>
    </div>

    <div class="add-div" id="add_id" style="display: none;">
            <h2>Adicionar Novo cliente</h2>
        <form class="" action="../../Controller/controllerCadastro.php" method="POST" >
            <div class="form-group">
                <label for="empresa">Nome da Empresa</label>
                <input type="text" class="form-control" name="empresa" id="empresa" placeholder="Empresa" required>
            </div>
            <div class="form-group">
                <label for="resp">Responsável</label>
                <input type="text" class="form-control" name="resp" id="resp" placeholder="Responsável" required>
            </div>
            <div class="form-group">
                <label for="cnpj">CNPJ</label>
                <input type="text" class="form-control" id="cnpj" name="cnpj" required>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="tel" class="form-control" id="telefone" placeholder="Telefone" name="telefone" required>
            </div>
            <div class="form-group">
                <label for="log">Logradouro</label>
                <input type="text" class="form-control" id="log" name="log" placeholder="Rua dos Paraiso, nº 0" required>
              </div>
              <div class="form-group">
                <label for="comple">Complemento</label>
                <input type="text" class="form-control" id="comple" name="comple" placeholder="Apartamento, hotel, casa, etc." required>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="city">Cidade</label>
                  <input type="text" class="form-control" id="city" name="city" required>
                </div>
                <div class="form-group col-md-4">
                <label for="city">Estado</label>
                  <input type="text" class="form-control" id="estado" name="estado" required>
                </div>
                <div class="form-group col-md-2">
                  <label for="CEP">CEP</label>
                  <input type="text" class="form-control" id="CEP" name="CEP" required>
                </div>
              </div>
              <button>Cadastrar</button>
        </form>
    </div>

    <div class="update-div" id="update_id" style="display: none;">
        <h2>Update cliente</h2>
        <table id="table_id_delete" class="display" >
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
                <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td><a href="#">Delete</a></td>
                    <td><a href="#" id="alter_id_2">Alterar</a></td>
                   
                </tr>
                <tr>
                    <td>Garrett Winters</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td><a href="#">Delete</a></td>
                    <td><a href="#" >Alterar</a></td>
                </tr>
                <tr>
                    <td>Ashton Cox</td>
                    <td>Junior Technical Author</td>
                    <td>San Francisco</td>
                    <td><a href="#">Delete</a></td>
                    <td><a href="#">Alterar</a></td>
                </tr>
                <tr>
                    <td>Cedric Kelly</td>
                    <td>Senior Javascript Developer</td>
                    <td>Edinburgh</td>
                    <td><a href="#" id>Delete</a></td>
                    <td><a href="#">Alterar</a></td>
                </tr>
             
            </tfoot>
        </table>
    </div>

    <div class="alter-div" id="alter_id" style="display: none;">
        <h2>Alterar Dados do Cliente</h2>
        <form class="" action="">
            <div class="form-group">
                <label for="empresa">Nome da Empresa</label>
                <input type="text" class="form-control" id="empresa" placeholder="Empresa">
            </div>
            <div class="form-group">
                <label for="resp">Responsável</label>
                <input type="text" class="form-control" id="resp" placeholder="Responsável">
            </div>
            <div class="form-group">
                <label for="cnpj">CNPJ</label>
                <input type="text" class="form-control" id="cnpj" name="cnpj">
            </div>
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="tel" class="form-control" id="telefone" placeholder="Telefone">
            </div>
            <div class="form-group">
                <label for="log">Logradouro</label>
                <input type="text" class="form-control" id="log" placeholder="Rua dos Paraiso, nº 0">
              </div>
              <div class="form-group">
                <label for="comple">Complemento</label>
                <input type="text" class="form-control" id="comple" placeholder="Apartamento, hotel, casa, etc.">
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="city">Cidade</label>
                  <input type="text" class="form-control" id="city">
                </div>
                <div class="form-group col-md-4">
                  <label for="Estado">Estado</label>
                  <select id="Estado" class="form-control">
                    <option selected>Escolher...</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label for="CEP">CEP</label>
                  <input type="text" class="form-control" id="CEP">
                </div>
              </div>
              <button>Alterar</button>
        </form>
    </div>

</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script><font></font>
    
    <script src="../script/renderer.js"></script>
    <script src="../script/hides.js"> </script>
    
</body>
</html>