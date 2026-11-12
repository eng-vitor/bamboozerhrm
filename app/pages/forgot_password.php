<?php
session_start();
?>
<!doctype html>
<html lang="pt-BR">
    <meta charset="utf-8" /><meta name="viewport" content="width=device-width,initial-scale=1" /><title>
        Esqueci a senha · BamboozerHRM</title>
        <link rel="stylesheet" href="../../src/css/style.css" />
        <link rel="stylesheet" href="../../vendor/fortawesome/font-awesome/css/all.css" />
    <div class="auth">
        <section class="hero">
            <div class="logo">BamboozerHRM</div>
            <h1>Cada hora trabalhada, registrada com clareza.</h1>
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
                    <h2>Redefinir senha</h2>
                    <p class="mu">Confirme seus dados para redefinir a senha.</p>
                </div>
                <form action="../core/change_password.php" method="POST">
                <label>E-mail<input type="email" name="emailresetpass" placeholder="nome@empresa.com" maxlength="100" required/></label>
                <label>Matrícula<input type="integer" name="regnumberresetpass" placeholder="12345678" minlength="3" maxlength="50" required /></label>
                <label>Documento (CPF ou RG)<input type="integer" name="idcardresetpass" placeholder="12345678900" minlength="7" maxlength="50" required /></label>
                <label>Nova Senha<input type="password" name="newpasswordresetpass" placeholder="••••••••" minlength="8" maxlength="100" required /></label>
                <div class="alert-simple alert-info" style="margin-top: 10px; margin-bottom: 10px;">
                    <strong>Informativo:</strong> A senha deve conter no mínimo 8 caracteres, incluindo letras maiúsculas, minúsculas, números e caracteres especiais.
                </div>
                <button class="btn p w100" type="submit">Trocar senha</button>
                </form>
                <a class="btn w100" href="../../index.php">Voltar ao login</a>
            </div>
        </section>
    </div>
</html>