<?php
if(!$_SESSION['DataAccount']['role']==0){
    $_SESSION['Msg'] = '<div class="alert alert-warning" role="alert"><i class="bi bi-exclamation-triangle-fill"></i> Seu usuário não tem permissão para acessar esta aba!</div>';
    header("Location: ..\..\system.php");
    exit;
}