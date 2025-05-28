<?php
$nome = null;
$sobrenome ="";
$idade = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $nome = $_POST ['txtnome'];
    $sobrenome = $_POST ['txtsobrenome'];
    $idade = $_POST ['txtidade'];
}

$mensagem = "Nome: $nome  $sobrenome<br>  Idade:$idade "
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
</head>
<body>
    <form class="formulario" action="001.php" method="post">
        
        <label>NOME</label>
        <br>
        <input type="text" name="txtnome" placeholder="Insira Seu Nome" required>
        <br>
        <label>SOBRENOME</label>
        <br>
        <input type="text" name="txtsobrenome" placeholder="Insira Seu Sobrenome" required>
        <br>
        <label>IDADE</label>
        <br>
        <input type="number" name="txtidade" placeholder="Insira Sua Idade" required>
        <br>
        <input type="submit" value="Enviar">
        
    </form>
    <h3><?php echo "$mensagem";?></h3>
</body>
</html>

