<?php 
    require_once('../src/session.php');

    $sessao = new Sessao;

    $sessao->encerraSessao();

    header("Location: login.html");
    exit;
?>