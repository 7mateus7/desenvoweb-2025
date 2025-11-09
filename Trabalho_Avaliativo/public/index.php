<?php 
    require_once('../src/perguntas.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliação de Qualidade</title>
    
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container">
        <h1>Avaliação de Qualidade de Serviços</h1>
        
        <form action="../src/respostas.php" method="POST">
            <input type="hidden" name="id_dispositivo" value="1">

            <?php echo buscarHtmlDasPerguntas(); ?>

            <button type="button" id="botaoProx">Próximo</button>
            
            <div class="blocoFinal">
                <div class="feedbackBloco">

                </div>
                <label for="feedback_textual">Em poucas palavras...</label>
                <textarea name="areaFeedback" id="areaFeedback" rows="4"></textarea>
                <button type="submit">Enviar Avaliação</button>
            </div>
        </form>

        <footer>
            <p>Sua avaliação espontânea é anônima, nenhuma informação pessoal é solicitada ou armazenada.</p>
        </footer>
    </div>

    <script src="js/script.js"></script>
</body>
</html>