<?php

$nome = $_GET['txtnome'];
$sobrenome = $_GET['txtsobrenome'];
$idade = $_GET['txtidade'];

$mensagem = "NOME: $nome $sobrenome<br>IDADE: $idade";

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMULARIO</title>
</head>
<body>
    <!-- FORMULARIO USA ACTION PARA CHAMAR UM SCRIPT PHP E O MÉTODO DE ENVIO -->
    <form class="formulario" action="formulario.php" method="post">
         <label>CÓDIGO</label>
        <br>
        <input type="number" id='txtcodigo' name="txtcodigo" placeholder="<?php echo($codigo);?>" disabled>

        <label>NOME</label>
        <br>
        <input type="text" id='txtnome' name="txtnome" placeholder="Insira seu nome" required>
        <br>
        <br>
        <label>SOBRENOME</label>
        <br>
        <input type="text" name="txtsobrenome" required>
        <br>
        <br>
        <label>IDADE</label>
        <br>
        <input type="number" name="txtidade" placeholder="Somente números"  required>
        <br>
        <br>
        <!-- BORA PRA ACTION -->
        <input type="submit" value="Ação">
    </form>

    <h3><?php echo"$mensagem";?></h3>
    
</body>
</html>