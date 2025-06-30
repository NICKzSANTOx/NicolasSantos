<?php
include("utils/conectadb.php");
include("utils/verificalogin.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT f.*, u.USU_LOGIN, u.USU_SENHA 
            FROM funcionarios f
            LEFT JOIN usuarios u ON u.FK_FUN_ID = f.FUN_ID
            WHERE f.FUN_ID = $id";
    $result = mysqli_query($link, $sql);
    $func = mysqli_fetch_assoc($result);
    if (!$func) {
        echo "<script>alert('Funcionário não encontrado!');window.location='funcionario_lista.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID não informado!');window.location='funcionario_lista.php';</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['remover'])) {
    mysqli_query($link, "DELETE FROM usuarios WHERE FK_FUN_ID = $id");
    mysqli_query($link, "DELETE FROM funcionarios WHERE FUN_ID = $id");
    echo "<script>alert('Funcionário removido com sucesso!');window.location='funcionario_lista.php';</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['remover'])) {
    $nomefun   = $_POST['txtnome'];
    $cpffun    = $_POST['txtcpf'];
    $funcaofun = $_POST['txtfuncao'];
    $contatofun = $_POST['txtcontato'];
    $ativofun  = $_POST['ativo'];
    $usulogin  = $_POST['txtlogin'];
    $ususenha  = $_POST['txtsenha'];

    $sql = "UPDATE funcionarios SET 
                FUN_NOME='$nomefun', 
                FUN_CPF='$cpffun', 
                FUN_FUNCAO='$funcaofun', 
                FUN_TEL='$contatofun', 
                FUN_ATIVO=$ativofun
                WHERE FUN_ID=$id";
    mysqli_query($link, $sql);

    if (!empty($usulogin)) {
        $sqlUsu = "SELECT USU_ID FROM usuarios WHERE FK_FUN_ID = $id";
        $resUsu = mysqli_query($link, $sqlUsu);
    
        if (mysqli_num_rows($resUsu) > 0) {
            $sqlUp = "UPDATE usuarios SET 
                        USU_LOGIN='$usulogin', 
                        USU_SENHA='$ususenha', 
                        USU_ATIVO=$ativofun 
                      WHERE FK_FUN_ID=$id";
            mysqli_query($link, $sqlUp);
    
        } else {
            $sqlIn = "INSERT INTO usuarios (USU_LOGIN, USU_SENHA, FK_FUN_ID, USU_ATIVO)
                      VALUES ('$usulogin', '$ususenha', $id, $ativofun)";
            mysqli_query($link, $sqlIn);
        }
    }
    echo "<script>alert('Dados atualizados com sucesso!');window.location='funcionario_lista.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Funcionário</title>
    <link rel="stylesheet" href="css/formulario.css">
    <link rel="stylesheet" href="css/global.css">
</head>
<body>
    <div class="global">
        <a href="funcionario_lista.php" class="btn-voltar" title="Voltar">
            <img src="Icons/arrow47.png" width="40" height="40" alt="Voltar">
        </a>
        <div class="formulario">
            <form class="login" method="POST" autocomplete="off">
                <h2>Editar Funcionário</h2>
                <label for="txtnome">Nome do Funcionário</label>
                <input type="text" id="txtnome" name="txtnome" value="<?= htmlspecialchars($func['FUN_NOME']) ?>" required>

                <label for="txtcpf">CPF</label>
                <input type="text" id="txtcpf" name="txtcpf" value="<?= htmlspecialchars($func['FUN_CPF']) ?>" maxlength="14" required>

                <label for="txtfuncao">Função</label>
                <input type="text" id="txtfuncao" name="txtfuncao" value="<?= htmlspecialchars($func['FUN_FUNCAO']) ?>" required>

                <label for="txtcontato">Contato</label>
                <input type="text" id="txtcontato" name="txtcontato" value="<?= htmlspecialchars($func['FUN_TEL']) ?>" maxlength="15" required>

                <fieldset>
                    <legend>Status do Usuário</legend>
                    <div class="status-radio-group">
                        <label>
                            <input type="radio" name="ativo" value="1" <?= $func['FUN_ATIVO'] == 1 ? 'checked' : '' ?>>
                            Ativo
                        </label>
                        <label>
                            <input type="radio" name="ativo" value="0" <?= $func['FUN_ATIVO'] == 0 ? 'checked' : '' ?>>
                            Inativo
                        </label>
                    </div>
                </fieldset>

                <hr>

                <h3>Acesso ao Sistema (opcional)</h3>
                <label for="txtlogin">Login</label>
                <input type="text" id="txtlogin" name="txtlogin" value="<?= htmlspecialchars($func['USU_LOGIN'] ?? '') ?>">

                <label for="txtsenha">Senha</label>
                <input type="password" id="txtsenha" name="txtsenha" value="<?= htmlspecialchars($func['USU_SENHA'] ?? '') ?>">

                <input type="submit" value="Salvar Alterações">
                <button type="submit" name="remover" value="1"
                    onclick="return confirm('Tem certeza que deseja remover este funcionário?');"
                    style="background:#e57373;color:#fff;border:none;border-radius:18px;padding:12px 0;margin-top:10px;cursor:pointer;font-weight:bold;">
                    Remover Funcionário
                </button>
            </form>
        </div>
    </div>
</body>
</html>