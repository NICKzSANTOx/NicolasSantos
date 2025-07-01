<?php


include("utils/conectadb.php");
include("utils/verificalogin.php");

$sqlcli = "SELECT * FROM clientes";
$enviaquery = mysqli_query($link, $sqlcli);



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
    <a href="backoffice.php" class="btn-voltar" title="Voltar"><img src="Icons/arrow47.png" width="40" height="40" alt="Voltar"></a>
        <div class='tabela'>
            <a href="backoffice.php"><img src='icons/arrow47.png' width=50 height=50></a>

            <table>
                <tr> 
                    <th>ID CLIENTE </th>
                    <th>NOME</th>
                    <th>CPF</th>
                    <th>CONTATO</th>
                    <th>STATUS</th>
                    <th>DATA NASCIMENTO</th> 
                    <th>ALTERAR</th>
                </tr>
                <?php
                    
                        while ($tbl = mysqli_fetch_array($enviaquery)){
                ?>
                
                <tr>
                    <td><?=$tbl[0]?></td> <!--COLETA CÓDIGO DO CLIENTE  [0] -->
                    <td><?=$tbl[1]?></td> <!--COLETA NOME DO CLIENTE  [1]-->
                    <td><?=$tbl[2]?></td> <!--COLETA CPF DO CLIENTE [2]-->
                    <td><?=$tbl[3]?></td> <!--COLETA CONTATO DO FUN[3]-->
                    <td><?=$tbl[5] == 1? 'ATIVO':'INATIVO'?></td> <!--COLETA ATIVO DO FUN [5]-->
                    <td><?=$tbl[4]?></td> <!--COLETA DATA NASCIMENTO DO FUN [4]-->

                    <td><a href='usuario_edita.php?id=<?= $tbl[0]?>'><button>ALTERAR</button></a></td>

                    
                </tr>
                <?php
                    }
                
                ?>
            </table>
        </div>

    </div>
    
    
</body>
</html>