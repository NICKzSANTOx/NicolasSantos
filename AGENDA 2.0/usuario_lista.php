<?php

include('utils/conectadb.php');
include('utils/verificalogin.php');

$sql = "SELECT * FROM clientes";
$result = mysqli_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/lista.css">
    <link rel="stylesheet" href="css/global.css">
    <title>Lista de Clientes</title>
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
                        <th>NOME</th>
                        <th>CPF</th>
                        <th>CONTATO</th>
                        <th>STATUS</th>
                        <th>LOGIN</th>  
                        <th>DATA de NASCIMENTO</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($row = mysqli_fetch_assoc($retorno)) { ?>
                    <tr>
                        <td><?= htmlspecialchars($row['CLI_ID']) ?></td>
                        <td><?= htmlspecialchars($row['CLI_NOME']) ?></td>
                        <td><?= htmlspecialchars($row['CLI_CPF']) ?></td>
                        <td><?= htmlspecialchars($row['FUN_TEL']) ?></td>
                        <td><?= htmlspecialchars($row['STATUS']) ?></td>
                        <td><?= htmlspecialchars($row['DATANACS']) ?></td>
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