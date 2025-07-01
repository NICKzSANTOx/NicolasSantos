<?=
include("concetadb.php");
session_start();


$query = "SELECT * FROM clientes";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <title>Lista de Usuários</title>
</head>
<body>
    <div class="global">
        <div class="tabela">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Contato</th>
                        <th>Login</th>
                        <th>Data de Nascimento</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                            <td><?= htmlspecialchars($row['CLI_ID']) ?></td>
                            <td><?= htmlspecialchars($row['CLI_NOME']) ?></td>
                            <td><?= htmlspecialchars($row['CLI_CPF']) ?></td>
                            <td><?= htmlspecialchars($row['CLI_TEL']) ?></td>
                            <td><?= htmlspecialchars($row['USU_LOGIN'] ?? '-') ?></td>
                            <td><?= htmlspecialchars($row['CLI_DATANASC']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>