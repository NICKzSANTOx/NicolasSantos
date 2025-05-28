<?php 

include("001.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $login = $_POST['txtlogin'];
    $senha = $_POST['txtsenha'];

    $sql = "SELECT COUNT(USU_LOGIN) FROM usuarios WHERE USU_LOGIN = '$login'";

    $enviar = mysqli_query($link, $sql);
    $retorno = mysqli_fetch_array($enviar) [0];
    
    if ($retorno == 0)
    {
        $sql = "INSERT INTO usuarios (USU_LOGIN, USU_SENHA) VALUES ('$login', '$senha')";
        
        $enviar = mysqli_query($link, $sql);

        echo "<script> window.alert('CADASTRO REALIZADO!');</script>";
        echo"<script> window.location.href='002.php';</script>";
    }
    else 
    {
        echo"<script> window.alert('USUARIO JA CADASTRADO!');</script>";
        
    }

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="003.css">
    <title>CADASTRO</title>
</head>
<body>
    <div class = "global">
        <div class="formulario">
            <form id = "cadastro" action ="005.php" method="post">
                <label>LOGIN</label>
                <br>
                <input type="text" name='txtlogin' placeholder="Login" required>
                <br>
                <label>SENHA</label>
                <br>
                <input type="password" name='txtsenha' placeholder="Senha" required>
                <br>
                <input type="submit" value="CADASTRO">
                <br>
            </form>   
            <br>
            <a href='002.PHP'>Cadastrar</a>   
        </div>
    </div>
</body>
</html>













