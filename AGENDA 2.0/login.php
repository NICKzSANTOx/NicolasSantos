<?php

include("utils/conectadb.php");
session_start();


if($_SERVER['REQUEST_METHOD']=='POST'){
    $login = $_POST['txtlogin'];
    $senha = $_POST['txtsenha'];
    
    $sqlfun ="SELECT FK_FUN_ID FROM usuarios WHERE USU_LOGIN = '$login' AND USU_SENHA = '$senha'"; 
    
    $enviaquery2 = mysqli_query($link, $sqlfun);
    $idfuncionario = mysqli_fetch_array($enviaquery2) [0];

    $sql = "SELECT COUNT(usu_id) FROM usuarios
    WHERE usu_login = '$login' AND usu_senha = '$senha'";
    
    $enviaquery = mysqli_query($link, $sql);
    $retorno = mysqli_fetch_array($enviaquery) [0];


    if($retorno == 1){
        $_SESSION['idfuncionario'] = $idfuncionario;
        Header("Location: backoffice.php");
    }
    else{
        echo("<script>window.alert('LOGIN OU SENHA INCORRETOS');</script>");
        echo("<script>window.location.href='login.php';</script>");
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/formulario.css">
    <link rel="stylesheet" href="css/global.css">
    <link href="https://fonts.cdnfonts.com/css/bagel-fat-one" rel="stylesheet">
    <title>LOGIN</title>
</head>
<body>
    <div class="global">
        <div class="formulario">
            <form class='login' action="login.php" method="post">
                <label>LOGIN</label>
                <input type='text' name='txtlogin' placeholder='Digite o seu Login'>
                <br>
                <label>SENHA</label>
                <input type='password' name='txtsenha' placeholder='Senha'>

                <br>
                <input type='submit' value='LOGIN'>
            </form>
            
            <br>

        </div>
    </div>
    
</body>
</html>
