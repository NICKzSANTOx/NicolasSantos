<?php
//conection
include ('utils/conectadb.php');
include ('utils/verificalogin.php');

//trazer os funcionarios do banco de dados
$sqlfuncionarios = "SELECT * FROM funcionarios";
$enviaquery = mysqli_query($link, $sqlfuncionarios);


//trazer os usuarios do banco de dados
$sqlusuarios = "SELECT * FROM usuarios";
$enviaquery2 = mysqli_query($link, $sqlusuarios);


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/lista.css">
    <link rel="stylesheet" href="css/global.css">
    <title>Lista</title>
</head>
<body>
    <div class ="global">
        <div class = "tabela">
        <a href="backoffice.php"><img src='icons/arrow47.png' width=50 height=50></a>    
        <table>
            <tr>
                <th>ID FUNCIONARIO</th>
                <th>NOME</th>
                <th>CPF</th>
                <th>CARGO</th>
                <th>CONTATO</th>
                <th>STATUS</th>
                <!-- Login usuario -->
                <th>LOGIN</th>
            </tr>
            <?php   
            while($tbl = mysqli_fetch_array($enviaquery)){ 
                while($tbl2 = mysqli_fetch_array($enviaquery2)){
            ?>
            <tr>
                <td> <?=$tbl[0]?> </td>
                <td> <?=$tbl[1]?> </td>
                <td> <?=$tbl[2]?> </td>
                <td> <?=$tbl[3]?> </td>
                <td> <?=$tbl[4]?> </td>
                <td> <?=$tbl[5]?> </td>
                <!-- Login usuario -->
                <td> <?=$tbl2[1]?> </td>
                                
            </tr>
                <?php
                }
            }
                ?>
                </table>
        </div>    

    </div>
</body>
</html>