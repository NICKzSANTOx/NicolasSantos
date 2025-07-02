<?php
// CONEXÃO COM O BANCO
include("utils/conectadb.php");
include("utils/verificalogin.php");

// TRAZ OS FUNCIONÁRIOS DO BANCO
$sqlcli = "SELECT * FROM clientes";
$enviaquery = mysqli_query($link, $sqlcli);

// TO DO: FAZER O RADIO OU BUTTON PARA LISTAR TODOS, INATIVOS, ATIVOS

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/lista.css">

    <title>LISTA CLIENTES</title>
</head>
<body>
    <div class='global'>
        <div class='tabela'>
            <!-- BOTÃO VOLTAR -->
            <a href="backoffice.php"><img src='icons/arrow47.png' width=50 height=50></a>
            <h1>LISTA DE CLIENTES</h1>
            
           
            <table>
                <tr> 
                    <th>ID CLIENTE</th>
                    <th>NOME</th>
                    <th>CPF</th>
                    <th>CONTATO</th>
                    <th>DATA NASCIMENTO</th>  
                    <th>STATUS</th>
                    <th>ALTERAÇÃO</th>
                </tr>

                <!-- COMEÇOU O PHP -->
                <?php
                    
                        while ($tbl = mysqli_fetch_array($enviaquery)){
                            // while($tbl2 = mysqli_fetch_array($enviaquery2)){
                ?>
                
                <tr>
                    <td><?=$tbl[0]?></td> <!--COLETA CÓDIGO DO CLI [0] -->
                    <td><?=$tbl[1]?></td> <!--COLETA NOME DO CLI [1]-->
                    <td><?=$tbl[2]?></td> <!--COLETA CPF DO CLI [2]-->
                    <td><?=$tbl[3]?></td> <!--COLETA CONTATO DO CLI[3]-->
                    <td><?=$tbl[5]?></td> <!--COLETA STATUS DO CLI [4]-->
                    <td><?=$tbl[4] == 1? 'ATIVO':'INATIVO'?></td> <!--COLETA ATIVO DO CLI [5]-->
                    
                    
                    <!-- USANDO GET BRABO -->
                    <td><a href='cliente_altera.php?id=<?= $tbl[0]?>'><img src='icons/pencil1.png' width=20 height=20 style='border: 2px solid #fff; border-radius: 1px; margin: 2px;'></a></td>

                    
                </tr>
                <?php
                    }
                
                ?>
            </table>
        </div>

    </div>
    
    
</body>
</html>