<?php 
    require_once('../src/session.php');
    require_once('../src/html_gerenciador_perguntas.php');

    $sessao = new Sessao;
    if(!$sessao->recuperaDados('usuario')){
        header('Location: login.html');
        exit;
    }

    function coletaUrl(){
        $id_url = filter_input(INPUT_GET, 'erro', FILTER_SANITIZE_SPECIAL_CHARS);
        if($id_url == 'tem_respostas'){
            echo gerarMensagemErro();
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de perguntas</title>
    <link rel="stylesheet" href="css/style_gerenciandor_perguntas.css">
</head>
<body>
    <div class="container">
        <h1>Gerenciador de Perguntas</h1>
        <?php echo gerarTabelaPerguntas(); ?>

        <div class="container-pergunta">
            <a href="criar_pergunta.php">Criar Pergunta?</a>
        </div>
    </div>

    <?= coletaURL()?>
</body>
</html>