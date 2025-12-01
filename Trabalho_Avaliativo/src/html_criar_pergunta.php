<?php
    function gerarFormularioPergunta($setores) {
    
        $html = '<!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Nova Pergunta</title>
            <link rel="stylesheet" href="css/style.css">
        </head>
        <body>
            <div class="container">
                <h1>Criar Nova Pergunta</h1>
                
                <form action="criar_pergunta.php" method="POST">
                    
                    <div class="grupo-formulario">
                        <label for="textoPerguntaId">Informe a sua Pergunta:</label>
                        <input type="text" name="textoPergunta" id="textoPerguntaId" required>
                    </div>

                    <div class="grupo-formulario">
                        <label for="statusInfoId">Disponibilidade:</label>
                        <select name="statusInfo" id="statusInfoId">
                            <option value="1">Ativo</option>
                            <option value="0">Inativo</option>
                        </select>
                    </div>

                    <div class="grupo-formulario">
                        <label for="setorInfoId">Setor:</label>
                        <select name="setorInfo" id="setorInfoId" required>
                            <option value="">Selecione um setor...</option>';
                                
                                foreach ($setores as $setor) {
                                    $nomeSetor = htmlspecialchars($setor);
                                    $html .= "<option value=\"$nomeSetor\">$nomeSetor</option>";
                                }

                    $html .='</select>
                            </div>

                            <div class="acoes-formulario">
                                <a href="gerenciador_perguntas.php" class="btn-cancelar">Cancelar</a>
                                <button type="submit" class="btn-salvar">Salvar Pergunta</button>
                            </div>

                            </form>
                        </div>    
                    </body>
                </html>';

        return $html;
    }
?>