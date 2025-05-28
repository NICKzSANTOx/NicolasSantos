<?php
session_start();

if (isset($_SESSION['Usuario'])){$_Usuario = $_SESSION['Usuario'];} 
else{
    echo"<script> window.alert('Acesso negado!');</script>";
    echo"<script> window.location.href='002.php';</script>";
}


include("001.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="002.css">
        <title>Document</title>
</head>
<body>
        <h1>Bem-vindo <?php echo ($_SESSION['Usuario'])?></h1>
        <p>Login Efetuado</p>
        <form action='004.php' value = "SAIR"><input type="submit" value="Sair"></form>

</body>
</html>