<?php 
include("001.php");

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $login = $_POST['txtlogin'];
    $senha = $_POST['txtsenha'];

    $sql = "SELECT COUNT(USU_ID) FROM usuarios WHERE USU_LOGIN = '$login' AND USU_SENHA = '$senha'";
    $enviar = mysqli_query($link, $sql);
    $retorno = mysqli_fetch_array($enviar) [0];
   
    if ($retorno == 1)
    {
       $_SESSION ['Usuario'] = $login;
       header("Location: 003.php");
       exit();
    }
    else {
        echo "<script> window.alert('login ou senha incorretos!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="001.css">
    <title>Formulario login</title>
</head>
<body>
    <div class = "global">
        <div class="formulario">
            <form action ="002.php" method="POST">
                <label>LOGIN</label>
                <br>
                <input type="text" name='txtlogin' placeholder="Login" required>
                <br>
                <label>SENHA</label>
                <br>
                <input type="password" name='txtsenha' placeholder="Senha" required>
                <br>
                <input type="submit" value="Enviar">
                <br>
            </form>   
            <br>
            <br>
            <a href='005.PHP'>Não tem cadastro? Cadastrar</a>   
        </div>
    </div>
</body>
</html>