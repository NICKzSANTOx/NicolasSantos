
<?php
// CONEXÃO COM O BANCO
include("utils/conectadb.php");
include("utils/verificalogin.php");

// TRAZ OS FUNCIONÁRIOS DO BANCO
$sqlfun = "SELECT * FROM funcionarios INNER JOIN usuarios ON FK_FUN_ID = FUN_ID";
$enviaquery = mysqli_query($link, $sqlfun);

// $sqlusu = "SELECT * FROM usuarios";
// $enviaquery2 = mysqli_query($link, $sqlusu);


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/lista.css">

    <title>LISTA FUNCIONÁRIOS</title>
</head>
<body>
    <div class='global'>
        <div class='tabela'>
            <!-- BOTÃO VOLTAR -->
            <a href="backoffice.php"><img src='icons/arrow47.png' width=50 height=50></a>

            <table>
                <tr> 
                    <th>ID FUNCIONARIO</th>
                    <th>NOME</th>
                    <th>CPF</th>
                    <th>CARGO</th>
                    <th>CONTATO</th>
                    <th>STATUS</th>
                    <!-- DADOS DO USUARIO -->
                    <th>LOGIN</th>
                </tr>

                <!-- COMEÇOU O PHP -->
                <?php
                    // while($tbl2 = mysqli_fetch_array($enviaquery2)){
                        while ($tbl = mysqli_fetch_array($enviaquery)){
                ?>
                
                <tr>
                    <td><?=$tbl[0]?></td> <!--COLETA CÓDIGO DO FUN [0] -->
                    <td><?=$tbl[1]?></td> <!--COLETA NOME DO FUN [1]-->
                    <td><?=$tbl[2]?></td> <!--COLETA CPF DO FUN [2]-->
                    <td><?=$tbl[3]?></td> <!--COLETA CONTATO DO FUN[3]-->
                    <td><?=$tbl[4]?></td> <!--COLETA ATIVO DO FUN [4]-->
                    <td><?=$tbl[5]?></td> <!--COLETA ATIVO DO FUN [5]-->
                    <!-- $tbl2 COLETA SOMENTE O NOME DO USUARIO DO FUN -->
                    <td><?=$tbl[7]?></td> <!--COLETA LOGIN DO USU [1]-->

                    
                </tr>
                <?php
                    }
    
                ?>
            </table>
        </div>

    </div>
    
    
</body>
</html>
