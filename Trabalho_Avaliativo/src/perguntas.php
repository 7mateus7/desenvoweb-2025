<?php
require_once('db.php');

function buscarHtmlDasPerguntas($id_dispositivo) {
    
    $pdo = getDbConnection();


    $stmtSetor = $pdo->prepare("SELECT setor FROM dispositivos WHERE id_dispositivo = :id");
    $stmtSetor->execute([':id' => $id_dispositivo]);
    $dispositivo = $stmtSetor->fetch(PDO::FETCH_ASSOC);

    if (!$dispositivo) {
        return "<p>Erro: Dispositivo não identificado.</p>";
    }
    
    $nomeSetor = $dispositivo['setor'];


    $sqlPerguntas = "SELECT id_pergunta, texto_pergunta 
                     FROM perguntas 
                     WHERE status = 1 AND setor = :setor 
                     ORDER BY id_pergunta";
                     
    $stmt = $pdo->prepare($sqlPerguntas);
    $stmt->execute([':setor' => $nomeSetor]);
    $perguntas = $stmt->fetchAll(PDO::FETCH_ASSOC);

 
    if (count($perguntas) === 0) {
        return "<p>Nenhuma pergunta cadastrada para o setor: $nomeSetor</p>";
    }

 
    $html_output = '';
    $i = 0; 

    foreach($perguntas as $pergunta){
       
        $html_output .= '<div class="blocoPergunta">
                            <p class="pergunta-texto"> '. htmlspecialchars($pergunta['texto_pergunta']) .'</p>';
        
       
        for($nota = 0; $nota <= 10; $nota++){
            $id_unico = 'p' . $pergunta['id_pergunta'] . '-r' . $nota;
            
            $html_output .= '<input type="radio" name="respostas['.$pergunta['id_pergunta'].']" value="'.$nota.'" id="'.$id_unico.'">';
            
            $html_output .= '<label for="'.$id_unico.'" class="escala-btn escala-'.$nota.'">'. $nota .'</label>';
        }
        $html_output .= '</div>';
    }

    return $html_output;
}
?>