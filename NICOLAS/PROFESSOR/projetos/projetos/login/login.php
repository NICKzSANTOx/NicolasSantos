<?php
// CONEXÃO COM O BANCO DE DADOS
include("conectadb.php");

if($_SERVER['REQUEST_METHOD']=='POST'){
    // COLETA OS DADOS DO CAMPO DE TEXTO DO HTML
    $login = $_POST['txtlogin'];
    $senha = $_POST['txtsenha'];

    // COMUNICA COM O BANCO MONTANDO AS QUERIES
    $sql = "SELECT COUNT(usu_id) FROM usuarios
    WHERE usu_login = '$login' AND usu_senha = '$senha'";
    
    // ENVIANDO A QUERY PARA O BANQUINHO
    $enviaquery = mysqli_query($link, $sql);
    // RETORNO DO QUE VEM DO BANCO
    $retorno = mysqli_fetch_array($enviaquery) [0];

    // VALIDAÇÃO DO RETORNO
    if($retorno == 1){
        Header("Location: https://google.com");
    }
    else{
        echo("<script>window.alert('LOGIN OU SENHA INCORRETOS');</script>");
    }


}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>LOGIN</title>
</head>
<body>
    <div class="global">
        <div class="formulario">
            <form action="login.php" method="post">
                <label>LOGIN</label>
                <br>
                <input type='text' name='txtlogin' placeholder='Digite o seu Login'>
                <br>
                <label>SENHA</label>
                <br>
                <input type='password' name='txtsenha' placeholder='Senha aqui'>

                <br>
                <input type='submit' value='FAZ O L...OGIN'>
            </form>
        </div>
    </div>
    
</body>
</html>
