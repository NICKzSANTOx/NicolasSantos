<?php
session_start();
// MECANISMO DE SEGURANÇA ANTI VARIAVEL DE SESSÃO VAZIA
if(isset($_SESSION['idfuncionario'])){
    // PREENCHE IDFUNCIONARIO COM VARIAVEL DE SESSÃO
    $idfuncionario = $_SESSION['idfuncionario'];

}
else{
    echo"<script>window.alert('NÃO LOGADO MEU BOM');</script>";
    echo"<script>window.location.href='login.php';</script>";

}
?>