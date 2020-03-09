<?php
require_once "../../Model/class.php";

function genericTable($tipo)
{
    $client = new cliente();

    $table = new generic();
    $table->GerarTable($client->ClietAll(), $tipo);
}


function busca($cnpj)
{
    $client = new cliente("", "", $cnpj);


    return $client->DadosClient();
}
function enderecos($cnpj)
{
    $end = new endereco();
    $end->seIdCliente($cnpj);
    $vet = $end->clientEndereco();
    $total = count($vet);

    for ($i = 0; $i < $total; $i++) {

        $v = $i + 1;
        echo"</form>";
        echo "<div id='end_id'>";
        echo "<p>Endereço " . $v . "</p>";

        echo "<form action='../../Controller/controllerAlter.php' method='POST'>";
        echo "<div class='form-row'>";
        echo "<div class='form-group col-md-4'>";
        echo "<label for='CEP'>CEP</label>";
        echo "<input type='text' class='form-control' id='CEP' name='CEP' onblur='pesquisacep(this.value);' value='" . $vet[$i][4] . "' size='8' required>";
        echo "</div>";
        echo " <div class='form-group col-md-4'>";
        echo "  <label for='bairr'>Bairro</label>";
        echo "<input type='text' class='form-control' id='bairro' name='bairro' placeholder='Bairro' value='" . $vet[$i][2] . "' required>";
        echo " </div>";
        echo " <div class='form-group col-md-4'>";
        echo "  <label for='city'>Cidade</label>";
        echo "  <input type='text' class='form-control id='city' name='city' placeholder='cidade' value='" . $vet[$i][1] . "' required>";
        echo "</div>";
        echo "  <div class='form-group col-md-4'>";
        echo " <label for='city'>Estado</label>";
        echo " <input type='text' class='form-control' id='estado' name='estado' placeholder='UF' value='" . $vet[$i][0] . "' required>";
        echo "  </div>";

        echo " <div class='form-group col-md-8'>";
        echo "  <label for='log'>Logradouro</label>";
        echo "  <input type='text' class='form-control' id='log' name='log' placeholder='Rua dos Paraiso, nº 0' value='" . $vet[0][5] . "' required>";
        echo "  </div>";

        echo " <div class='form-row''>";

        echo " <div class='form-group col-md-4'>";
        echo "  <label for='comple'>Complemento</label>";
        echo "   <input type='text' class='form-control' id='comple' name='comple' placeholder='Apartamento, hotel, casa, etc.' value='" . $vet[0][6] . "' required>";
        echo " </div>";
        echo " <div class='form-group col-md-2'>";
        echo "  <label for='numero'>Numero</label>";
        echo "  <input type='text' class='form-control' id='numero' name='numero' value='" . $vet[0][4] . "' required>";
        echo "  </div>";
        echo " <input type='Hidden' id='acao' name='acao' value='AlterarEndereco'>";
        echo " <input type='hidden' id='idEnd' name='idEnd' value='" . $vet[0][6] . "'>";
        
        echo "</div>";
        
        echo"</form>";
        echo "</div>";
        echo "<a style='margin-left: 40% 'href='../../Controller/controllerAlter.php?acao=deleteEnd&id=" . $vet[$i][7] . "'><button class='btn btn-info'>Delete</button></a>";
        echo "</div>";
     
        
    }
}
