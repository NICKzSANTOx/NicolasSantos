<?php
include("001.php");
$sql = "SELECT * FROM usuarios";
$enviar = mysqli_query($link, $sql);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista</title>
</head>
<body>
    <table class = "ListaUsuarios">
        <tr>
            <th>Id</th>
            <th>Login</th>
        </tr>
        <?php 
        
        while($tbl = mysqli_fetch_array($enviar)) 
        {
        ?>
        <tr>
            <td><?= $tbl[0];?></td>
            <td><?= $tbl[1];?></td>
        </tr>
    
        <?php
        }
        ?>
    </table>
</body>
</html>