<?php
require_once('../src/session.php');
require_once('../src/db.php');
require_once('../src/html_admin.php');

$sessao = new Sessao();
if(!$sessao->recuperaDados('usuario')){
    header('Location: login.html');
    exit;
}

$pdo = getDbConnection();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel Administrativo</title>
    <link rel="stylesheet" href="css/style_dashboard.css">
</head>
<body>
    <div class="container">
        <h1>Dashboard de Qualidade</h1>
        
        <div class='container-logout'>
             <a href="logout.php" class='link-logout'>Sair</a>
        </div>
        <?php 
            if ($pdo) {
                echo geraHtmlDashboard($pdo); 
            } else {
                echo "<p>Erro ao conectar ao banco de dados.</p>";
            }
        ?>
    </div>
</body>
</html>