<?php
    function gerarFormularioPergunta($setores, $perguntaAtual) {
        if(!$perguntaAtual){
            $textoPergunta = "Informe a sua pergunta";
        }else{
            $textoPergunta = $perguntaAtual['texto_pergunta'];
        }

        if($perguntaAtual['status'] == 0){
            $status = 0;
        }else{
            $status = 1;
        }

        $html = '<!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Editar Pergunta</title>
            <link rel="stylesheet" href="css/style_editar.css">
        </head>
        <body>
            <div class="container">
                <h1>Editar Pergunta</h1>
                
                <form action="editar.php" method="POST">
                    
                    <div class="grupo-formulario">
                        <label for="textoPerguntaId">Pergunta:</label>
                        <input type="text" name="textoPergunta" id="textoPerguntaId" required value="'.$textoPergunta .'">
                    </div>

                    <div class="grupo-formulario">
                        <label for="statusInfoId">Disponibilidade:</label>
                        <select name="statusInfo" id="statusInfoId">';
                        if($status == 0){
                            $html .= '<option value="1">Ativo</option>
                            <option value="0" selected>Inativo</option>';
                        }else{
                            $html .= '<option value="1" selected >Ativo</option>
                            <option value="0" >Inativo</option>';
                        };
                        $html .= '</select>
                    </div>

                    <div class="grupo-formulario">
                        <label for="setorInfoId">Setor:</label>
                        <select name="setorInfo" id="setorInfoId" required>';
                        foreach($setores as $setor){
                            $nomeSetor = htmlspecialchars($setor);
                            if($nomeSetor == $perguntaAtual['setor']){
                                $html .= "<option value=\"$nomeSetor\" selected>$nomeSetor</option>";
                            }else{
                                $html .= "<option value=\"$nomeSetor\">$nomeSetor</option>";
                            }
                        }

                    $html .='</select>
                            </div>

                            <div class="acoes-formulario">
                                <a href="gerenciador_perguntas.php" class="btn-cancelar">Cancelar</a>
                                <button type="submit" class="btn-salvar">Salvar Edição</button>
                                <input type="hidden" name="id" value="'.$perguntaAtual['id_pergunta'].'">
                            </div>

                            </form>
                        </div>    
                    </body>
                </html>';

        return $html;
    }
?>