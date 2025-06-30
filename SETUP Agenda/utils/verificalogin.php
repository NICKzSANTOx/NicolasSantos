<?php
session_start();
if(isset($_SESSION['idfuncionario'])){
    $idfuncionario = $_SESSION['idfuncionario'];
}
else{
    echo"<script>window.alert('NÃO LOGADO MEU BOM');</script>";
    echo"<script>window.location.href='login.php';</script>";

}
?>