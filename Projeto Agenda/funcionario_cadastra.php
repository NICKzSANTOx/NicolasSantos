<?php


include("utils/conectadb.php");
include("utils/verificalogin.php");


if($_SERVER['REQUEST_METHOD']=='POST'){
    
    
    $nomefun = $_POST['txtnome'];
    $cpffun = $_POST['txtcpf'];
    $funcaofun = $_POST['txtfuncao'];
    $contatofun = $_POST['txtcontato'];
    $ativofun = $_POST['ativo'];

    $usulogin = $_POST['txtusuario'];
    $ususenha = $_POST['txtsenha'];

    $sql = "SELECT COUNT(fun_cpf) FROM funcionarios
    WHERE fun_cpf = '$cpffun'";
    

    $enviaquery = mysqli_query($link, $sql);
    $retorno = mysqli_fetch_array($enviaquery) [0];


    if($retorno == 1){
        echo("<script>window.alert('FUNCIONARIO JÁ EXISTE');</script>");

    }
    else{
        $sql = "INSERT INTO funcionarios (FUN_NOME, FUN_CPF, FUN_FUNCAO, FUN_TEL, FUN_ATIVO)
        VALUES ('$nomefun', '$cpffun', '$funcaofun', '$contatofun', $ativofun )";

     
        $enviaquery = mysqli_query($link, $sql);

        if($usulogin != null){
            $sql = "SELECT FUN_ID FROM funcionarios where FUN_CPF = '$cpffun'";
            $enviaquery = mysqli_query($link, $sql);
            $retorno = mysqli_fetch_array($enviaquery) [0];

            $sqlusu = "INSERT INTO usuarios (USU_LOGIN, USU_SENHA, FK_FUN_ID, USU_ATIVO)
            VALUES ('$usulogin', '$ususenha', $retorno, $ativofun)";
            $enviaqueryusu = mysqli_query($link, $sqlusu);
        }
        
        echo("<script>window.alert('FUNCIONARIO ALASTRADO COM SUCESSO!');</script>");
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

    <title>LOGIN FUNCIONARIO</title>
</head>
<body>
    <div class = "global">
        <div class="formulario">

        <a href="backoffice.php"><img src='icons/arrow47.png' width=50 height=50></a>
            
        <form class= 'login' action ="funcionario_cadastra.php" method="POST">

                <label>Nome Funcionario</label>
                <input type="text" name='txtnome' placeholder="Digite seu Nome" required>
                <br>
                <label>CPF</label>
                <input type="number" name='txtcpf' placeholder="Digite seu CPF" required>
                <br>
                <label>Função</label>
                <input type="text" name='txtfuncap' placeholder="Digite sua função" required>
                <br>
                <label>Contato</label>
                <input type="number" name='txttelefone' placeholder="Digite seu N° de Telefone" required>
                <br>
                <br>
                <br>
                <br>

                <label>LOGIN</label>
                <input type="text" name='txtlogin' placeholder="Login">
                <br>
                <label>SENHA</label>
                <input type="password" name='txtsenha' placeholder="Senha">
                <br>

                <label>USUARIO:</label>
                <div class = 'rbativo'>
                <input type="radio" name="ativo" id = "ativo" value="1" checked><label>Ativo</label>

                <input type="radio" name="ativo" id = "inativo" value="0"><label>Inativo</label>    
                </div>
                
                <br>
                <input type="submit" value="Enviar">
            </form>   
            <br>
            <br>
 
        </div>
    </div>
</body>
</html>