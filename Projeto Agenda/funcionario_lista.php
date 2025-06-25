<?php

include('utils/conectadb.php');
include('utils/verificalogin.php');

$sql = "SELECT f.FUN_ID, f.FUN_NOME, f.FUN_CPF, f.FUN_FUNCAO, f.FUN_TEL, 
               IF(f.FUN_ATIVO=1,'Ativo','Inativo') as STATUS, u.USU_LOGIN
        FROM funcionarios f
        LEFT JOIN usuarios u ON u.FK_FUN_ID = f.FUN_ID";
$result = mysqli_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/lista.css">
    <link rel="stylesheet" href="css/global.css">
    <title>Lista de Funcionários</title>
</head>
<body>
    <div class="global">
        <a href="backoffice.php" class="btn-voltar" title="Voltar">
            <img src="icons/arrow47.png" width="40" height="40" alt="Voltar">
        </a>
        <div class="tabela">
            <table>
                <thead>
                    <tr>
                        <th>ID FUNCIONÁRIO</th>
                        <th>NOME</th>
                        <th>CPF</th>
                        <th>CARGO</th>
                        <th>CONTATO</th>
                        <th>STATUS</th>
                        <th>LOGIN</th>
                        <th>AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?= htmlspecialchars($row['FUN_ID']) ?></td>
                        <td><?= htmlspecialchars($row['FUN_NOME']) ?></td>
                        <td><?= htmlspecialchars($row['FUN_CPF']) ?></td>
                        <td><?= htmlspecialchars($row['FUN_FUNCAO']) ?></td>
                        <td><?= htmlspecialchars($row['FUN_TEL']) ?></td>
                        <td><?= htmlspecialchars($row['STATUS']) ?></td>
                        <td><?= htmlspecialchars($row['USU_LOGIN'] ?? '-') ?></td>
                        <td>
                            <a href="funcionario_edita.php?id=<?= urlencode($row['FUN_ID'])?>" class="btn-editar" title="Editar cadastro">
                                <img src="Icons/editar.png" width="20" height="20" alt="Editar">
                        </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>