<?php
    require_once('db.php');
    function buscarHtmlDasPerguntas() {
    
        $pdo = getDbConnection();

        $consulta = 'SELECT id_pergunta, texto_pergunta FROM perguntas  WHERE status = 1';
        $stmt  =$pdo->query($consulta);

        $perguntas= $stmt->fetchAll(PDO::FETCH_ASSOC);

        $html_output = '';

       foreach($perguntas as $pergunta){
            $html_output .= '<div class="blocoPergunta"><label> '. $pergunta['texto_pergunta'] .'</label>';
            for($i = 0; $i<=10; $i++){
                $html_output .= '<input type="radio" name="respostas['.$pergunta['id_pergunta'].']" value="'.$i.'">';
            }
            $html_output .= '</div>';
       }

        return $html_output;
        }
?>