<?php

// CONEXÃO COM O BANCO DE DADOS
include("utils/conectadb.php");
include("utils/verificalogin.php");

// COLETANDO E PREENCHENDO OS DADOS NOS CAMPOS
$id = $_GET['id']; //COLETANDO O ID VIA GET NA URL

$sql = "SELECT * FROM clientes ON FK_FUN_ID = FUN_ID WHERE FUN_ID = $id";
$enviaquery = mysqli_query($link, $sql);

// PREENCHENDO OS CAMPOS COM WHILE
    while($tbl = mysqli_fetch_array($enviaquery)){
        
        $nomefun = $tbl[1];
        $cpffun = $tbl[2];
        $funcaofun = $tbl[3];
        $contatofun = $tbl[4];
        $ativofun = $tbl[5];

        // USUÁRIO
        $usulogin = $tbl[7];
        $ususenha = $tbl[8];
        $usuativo = $tbl[10];
        
    }

//APÓS ALTERAÇÕES FAZER O SAVE NO BANCO
if($_SERVER['REQUEST_METHOD']=='POST'){
    
    // COLETAR CAMPOS DOS INPUTS POR NAMES PARA VARIÁVEIS PHPs
    $id = $_POST['txtid'];

    $nomefun = $_POST['txtnome'];
    $cpffun = $_POST['txtcpf'];
    $funcaofun = $_POST['txtfuncao'];
    $contatofun = $_POST['txtcontato'];
    $ativofun = $_POST['ativo'];
    
    // COLETA PARA O USUARIO
    $usulogin = $_POST['txtusuario'];
    $ususenha = $_POST['txtsenha'];
    

    // INICIANDO QUERIES DE BANCO

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/formulario.css">
    <link rel="stylesheet" href="css/global.css">

    <title>DADOS DO CLIENTE</title>
</head>
<body>
    <div class="global">
        
        <div class="formulario">

 
            <a href="backoffice.php"><img src='icons/arrow47.png' width=50 height=50></a>
            
            <form class='login' action="usuario_cadastra.php" method="post">
                

                <input type='hidden' name='txtid' value='<?= $id?>'>

                <label>NOME DO USUARIO</label>
                <input type='text' name='txtnome' value = "<?= $nomefun ?>" required>
                <br>
                <label>CPF</label>
                <input type='number' name='txtcpf' value="<?= $cpffun ?>" disabled required>
                <br>
                <label>CONTATO</label>
                <input type='number' name='txtcontato' value="<?= $contatofun ?>" required>
                <br>
                <label>STATUS</label>
                
              
                <div class='rbativo'>
                    <!-- VERIFICAR POR QUE DESSE VALUE == 1 ANTES DO ROLÊ -->
                    <input type="radio" name="ativofun" id="ativo" value="1" <?= $ativofun == 1? 'checked' : ''?>><label>ATIVO</label>
                    <br>
                    <input type="radio" name="ativofun" id="inativo" value="0" <?= $ativofun == 0? 'checked' : ''?>><label>INATIVO</label>
                </div>
                
                <br>
                <br>
                <br>
                <br>
    
                <!-- AGORA CALASTRAMOS O USUARIO NO SISTEMA -->
                <label>DIGITE LOGIN</label>
                <input type='text' name='txtusuario' disabled value = "<?= $usulogin ?>">
                <br>
                <!-- IMPORTANTE O BANCO NÃO SABER A SENHA DO USUARIO -->
                <!-- NÃO TRAZER SENHA OU TRAZER CRIPTOGRAFADA  -->
                <label>SENHA</label>
                <input type='password' name='txtsenha' value = "<?= $ususenha ?>">
                <br>
          
                <label>INICIAR USUARIO COMO:</label>
                <div class='rbativo'>
                    <!-- ESSE RADIO VERIFICA USUARIO -->
                    <input type="radio" name="ativousu" id="ativo" value="1" <?= $usuativo == 1? 'checked' : ''?>><label>ATIVO</label>
                    <br>
                    <input type="radio" name="ativousu" id="inativo" value="0" <?= $usuativo == 0? 'checked' : ''?>><label>INATIVO</label>
                </div>

                <br>
                <input type='submit' value='SALVAR ALTERAÇÕES'>
            </form>
            
            <br>

        </div>
    </div>
    
</body>
</html>
