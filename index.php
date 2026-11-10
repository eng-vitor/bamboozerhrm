<?php
    echo 'BamboozerHRM' . ' - ' .  date('Y');
 ?>
<!doctype html>
<html lang="pt-BR">
    <meta charset="utf-8" /><meta name="viewport" content="width=device-width,initial-scale=1" /><title>
        Entrar · BamboozerHRM</title
    ><link rel="stylesheet" href="./src/css/style.css" />
    <div class="auth">
        <section class="hero">
            <div class="logo">BamboozerHRM</div>
            <h1>Cada hora trabalhada, registrada com clareza.</h1>
            <p class="mu">Controle de ponto, jornadas e ajustes em um só lugar.</p>
        </section>
        <section class="pane">
            <div class="card">
                <div>
                    <h2>Entrar na sua conta</h2>
                    <p class="mu">Use seu e-mail corporativo.</p>
                </div>
                <label>E-mail<input type="email" placeholder="nome@empresa.com" /></label
                ><label>Senha<input type="password" placeholder="••••••••" /></label>
                <div class="sp">
                    <span class="mu">Manter conectado</span
                    ><a href="esqueci-senha.html" style="color: var(--pr)">Esqueci a senha</a>
                </div>
                <a class="btn p w100" href="admin.html">Entrar como administrador</a
                ><a class="btn w100" href="user.html">Entrar como funcionário</a>
            </div>
        </section>
    </div>
</html>