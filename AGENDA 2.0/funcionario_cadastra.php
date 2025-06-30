<?php
include("utils/conectadb.php");
include("utils/verificalogin.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomefun   = $_POST['txtnome'];
    $cpffun    = $_POST['txtcpf'];
    $funcaofun = $_POST['txtfuncao'];
    $contatofun = $_POST['txtcontato'];
    $ativofun  = $_POST['ativo'];

    $usulogin  = $_POST['txtlogin'];
    $ususenha  = $_POST['txtsenha'];

    $sql = "SELECT COUNT(fun_cpf) FROM funcionarios WHERE fun_cpf = '$cpffun'";
    $enviaquery = mysqli_query($link, $sql);
    $retorno = mysqli_fetch_array($enviaquery)[0];

    if ($retorno == 1) {
        echo "<script>window.alert('FUNCIONÁRIO JÁ EXISTE');</script>";
    } else {
        $sql = "INSERT INTO funcionarios (FUN_NOME, FUN_CPF, FUN_FUNCAO, FUN_TEL, FUN_ATIVO)
                VALUES ('$nomefun', '$cpffun', '$funcaofun', '$contatofun', $ativofun)";
        $enviaquery = mysqli_query($link, $sql);

        if (!empty($usulogin)) {
            $sql = "SELECT FUN_ID FROM funcionarios WHERE FUN_CPF = '$cpffun'";
            $enviaquery = mysqli_query($link, $sql);
            $retorno = mysqli_fetch_array($enviaquery)[0];

            $sqlusu = "INSERT INTO usuarios (USU_LOGIN, USU_SENHA, FK_FUN_ID, USU_ATIVO)
                       VALUES ('$usulogin', '$ususenha', $retorno, $ativofun)";
            $enviaqueryusu = mysqli_query($link, $sqlusu);
        }
        echo "<script>window.alert('FUNCIONÁRIO CADASTRADO COM SUCESSO!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Funcionário</title>
    <link rel="stylesheet" href="css/formulario.css">
    <link rel="stylesheet" href="css/global.css">
</head>
<body>
    <div class="global">
        <a href="backoffice.php" class="btn-voltar" title="Voltar"><img src="Icons/arrow47.png" width="40" height="40" alt="Voltar"></a>
        <div class="formulario">
            <form class="login" action="funcionario_cadastra.php" method="POST" autocomplete="off">
                <h2>Cadastro de Funcionário</h2>
                <label for="txtnome">Nome do Funcionário</label>
                <input type="text" id="txtnome" name="txtnome" placeholder="Digite o nome" required>

                <label for="txtcpf">CPF</label>
                <input type="text" id="txtcpf" name="txtcpf" placeholder="Digite o CPF" maxlength="14" required>

                <label for="txtfuncao">Função</label>
                <input type="text" id="txtfuncao" name="txtfuncao" placeholder="Digite a função" required>

                <label for="txtcontato">Contato</label>
                <input type="text" id="txtcontato" name="txtcontato" placeholder="Digite o telefone" maxlength="15" required>

                <fieldset style="border:none; margin: 10px 0 0 0; padding:0;">
                    <legend style="font-size:1em; color:#3E5C76; margin-bottom:8px;">Status do Usuário</legend>
                    <div style="display:flex; gap:18px; justify-content:center;">
                        <label>
                            <input type="radio" name="ativo" value="1" checked>
                            Ativo
                        </label>
                        <label>
                            <input type="radio" name="ativo" value="0">
                            Inativo
                        </label>
                    </div>
                </fieldset>

                <hr style="margin:18px 0; border:0; border-top:1px solid #F8BBD0;">

                <h3 style="color:#3E5C76; font-size:1.1em; margin-bottom:8px;">Acesso ao Sistema (opcional)</h3>
                <label for="txtlogin">Login</label>
                <input type="text" id="txtlogin" name="txtlogin" placeholder="Login de acesso">

                <label for="txtsenha">Senha</label>
                <input type="password" id="txtsenha" name="txtsenha" placeholder="Senha">

                <input type="submit" value="Cadastrar Funcionário">
            </form>
        </div>
    </div>
</body>
</html>