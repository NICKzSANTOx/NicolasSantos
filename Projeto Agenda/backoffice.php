<?php 
include ("utils/conectadb.php");
session_start();

$idfuncionario= $_SESSION['idfuncionario'];

if (isset($_SESSION['idfuncionario']))
{
    $idfuncionario = $_SESSION['idfuncionario'];
    $sql = "SELECT FUN_NOME FROM funcionarios WHERE FUN_ID = '$idfuncionario'";
    $enviaquery = mysqli_query($link, $sql);
    $nomeusuario = mysqli_fetch_array($enviaquery) [0];
} 
else
{
    echo"<script> window.alert('Acesso negado!');</script>";
    echo"<script> window.location.href='login.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <title>BACKOFFICE</title>

</head>
<body>
    <div class="global">
        <div class="topo">
            <h1>BEM VINDO<?php echo strtoupper ($nomeusuario)?></h1>
            <div class="logout" method='post'>
                <form action='logout.php'>
                    <a href='logout.php'><img src='Icons/arrow47.png' width='50px' height='50px'></a>
            </form>
            </div>          
        </div>

            <div class='menus'>
                <div class="menu1">
                    <a href="funcionario_cadastra.php"><img src = "utils/Icons/add9.png" width = "200px" height = "200px"></a>
                </div>
                <div class="menu2">
                    <a href="funcionario_lista.php"><img src = "utils/Icons/th2.png" width = "200px" height = "200px"></a>
                </div>
               <div class="menu3">
                    <a href="usuario_cadastra.php"><img src = "utils/Icons/business.png" width = "200px" height = "200px"></a>
                </div>
                <div class="menu4">
                    <a href="usuario_lista.php"><img src = "utils/Icons/group1.png" width = "200px" height = "200px"></a>
                </div>
            </div>
    </div>
    
</body>
</html>