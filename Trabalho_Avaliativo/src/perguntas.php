<?php
    require_once('db.php'); 
    
    function buscarHtmlDasPerguntas() {
    
        $pdo = getDbConnection();

        $consulta = 'SELECT id_pergunta, texto_pergunta FROM perguntas  WHERE status = 1';
        $stmt  =$pdo->query($consulta);

        $perguntas= $stmt->fetchAll(PDO::FETCH_ASSOC);

        $html_output = '';

       foreach($perguntas as $pergunta){
            $html_output .= '<div class="blocoPergunta"><p class="pergunta-texto"> '. $pergunta['texto_pergunta'] .'</p>';
            for($i = 0; $i<=10; $i++){
                $id_unico = 'p' . $pergunta['id_pergunta'] . '-r' . $i;
                $html_output .= '<input type="radio" name="respostas['.$pergunta['id_pergunta'].']" value="'.$i.'" id="'.$id_unico.'">';
                $html_output .= '<label for="'.$id_unico.'" class="escala-btn escala-'.$i.'">'. $i .'</label>';
            }
            $html_output .= '</div>';
       }

        return $html_output;
        }
?>