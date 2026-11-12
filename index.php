<?php 
session_start();
require __DIR__.'\env.php';
include __DIR__.'\app\core\server_status.php';
if(isset($_SESSION['DataAccount']['id'])){
    header("Location: ../app/pages/system.php");
    exit();
}
?>
<!doctype html>
<html lang="pt-BR">
    <meta charset="utf-8" /><meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Entrar · BamboozerHRM</title>
    <link rel="stylesheet" href="./src/css/style.css" />
    <link rel="stylesheet" href="./vendor/fortawesome/font-awesome/css/all.css" />
    <div class="auth">
        <section class="hero">
            <div class="logo">BamboozerHRM</div>
            <h1 style="font-weight: 600;">Cada hora trabalhada, registrada com clareza.</h1>
            <p class="mu">Controle de ponto, jornadas e ajustes em um só lugar.</p>
        </section>
        <section class="pane">
            <div class="card">
            <div class="msg" align="center">
                <?php
                    if(isset($_SESSION['Msg'])){
                        echo $_SESSION['Msg'];
                        unset($_SESSION['Msg']);
                    }
                    else{
                        unset($_SESSION['Msg']);
                    }
                ?>
            </div>
                <div>
                    <h2>Entrar na sua conta</h2>
                    <p class="mu">Use seu e-mail corporativo.</p>
                </div>
                <form action="app/core/login.php" method="POST">
                <label>E-mail<input type="email" name="loginuser" placeholder="nome@empresa.com" required/></label>
                <label>Senha<input type="password" name="loginpass" placeholder="••••••••" required /></label>
                <div class="sp">
                    <a href="./app/pages/forgot_password.php" style="color: var(--pr)">Esqueci a senha</a>
                </div>
                <button class="btn p w100" style="margin-top: 10px;" type="submit">Entrar</button>
                </form>
                <p style="text-align: center; margin-top:10px; color: #95a5a6;">
                    <?=$SERVER_NAME.' '.$SYSTEM_VERSION; ?> - <?=date('Y'); ?>
                </p>
            </div>
        </section>
    </div>
    <script src="./vendor/fortawesome/font-awesome/js/all.js"></script>
</html>