<?php
session_start();
require __DIR__.'..\..\..\env.php';
include __DIR__.'\..\core\server_status.php';
include __DIR__.'\..\core\verifyauth.php';
include __DIR__.'\..\core\verifypermission.php';

?>
<!doctype html>
<html lang="pt-BR">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Painel do administrador · BamboozerHRM</title>
<link rel="stylesheet" href="../../src/css/style.css">
<link rel="stylesheet" href="../../vendor/fortawesome/font-awesome/css/all.css" />
<div class="app">
  <aside>
    <div class="logo">BamboozerHRM</div>
    <nav>
      <b>Administração</b>
      <a href="./dashboard.php" class=on><i class="fa-solid fa-chart-line"></i> Dashboard</a>
      <a href="funcionario-novo.html"><i class="fa-solid fa-user-plus"></i> Novo funcionário</a>
      <a href="organizacao-nova.html"><i class="fa-regular fa-building"></i> Organização</a>
      <a href="calendario.html"><i class="fa-regular fa-calendar-days"></i> Calendário mensal</a>
      <a href="ajuste-ponto.html"><i class="fa-solid fa-sliders"></i> Ajuste de ponto</a>
      <a href="relatorios.html"><i class="fa-regular fa-file-lines"></i> Relatórios</a><b>Conta</b>
      <a href="user.html"><i class="fa-solid fa-house-user"></i> Ver como funcionário</a>
      <a href="../core/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sair</a></nav>
  </aside>
  <div>
    <header class="top">
      <h1>Painel do administrador</h1>
      <div class="av"><?= $_SESSION['DataAccount']['fullname']; ?></div>
    </header>
    <main>
      <div class="g g4">
        <div class="card st"><span class=mu>Presentes agora</span><b>128</b><small class=mu>de 164 funcionários</small></div>
        <div class="card st"><span class=mu>Atrasos hoje</span><b>9</b><small class=mu>tolerância de 10 min</small></div>
        <div class="card st"><span class=mu>Ausências</span><b>6</b><small class=mu>2 justificadas</small></div>
        <div class="card st"><span class=mu>Ajustes pendentes</span><b>4</b><small><a href="ajuste-ponto.html" style="color:var(--pr)">Revisar</a></small></div>
      </div>
      <div class="g g2">
        <div class=card>
          <h2>Marcações em tempo real</h2>
          <table>
            <thead>
              <tr>
                <th>Funcionário
                  <th>Tipo
                    <th>Hora
                      <th>Status
                        <tbody>
                          <tr>
                            <td>Marina Souza</td>
                            <td>Entrada</td>
                            <td>07:58</td>
                            <td><span class="bd ok">No horário</span></td>
                          </tr>
                          <tr>
                            <td>Carlos Lima</td>
                            <td>Entrada</td>
                            <td>08:17</td>
                            <td><span class="bd wa">Atraso</span></td>
                          </tr>
                          <tr>
                            <td>Ana Paula</td>
                            <td>Saída almoço</td>
                            <td>12:02</td>
                            <td><span class="bd ok">No horário</span></td>
                          </tr>
                          <tr>
                            <td>João Pedro</td>
                            <td>—</td>
                            <td>—</td>
                            <td><span class="bd ba">Sem marcação</span></td>
                          </tr>
                          <tr>
                            <td>Beatriz Nunes</td>
                            <td>Entrada</td>
                            <td>08:01</td>
                            <td><span class="bd ok">No horário</span></td>
                          </tr>
          </table>
        </div>
        <div class="card c">
          <h2>Presença hoje</h2>
          <div class=ring style="--t:78" data-t="78%"></div>
          <p class=mu>128 de 164 presentes</p>
        </div>
      </div>
    </main>
  </div>
</div>
<script src="../../vendor/fortawesome/font-awesome/js/all.js"></script>
</html>