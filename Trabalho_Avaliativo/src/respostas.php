<?php
    require_once('db.php');

    function redirecionar(){
        header("Location: ../public/obrigado.html");
        exit;
    }


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        function limpaDados(){
            $comentario = filter_input(INPUT_POST, 'areaFeedback', FILTER_SANITIZE_SPECIAL_CHARS);
            $respostas = $_POST['respostas'] ?? [];
            $dispositivoInfo = filter_input(INPUT_POST, 'id_dispositivo', FILTER_VALIDATE_INT);

            return ['comentario_limpo' => $comentario,
                    'respostas_limpas' => $respostas,
                    'dispositivo_limpo' => $dispositivoInfo];
        }

        function salvarAvaliacao($comentario, $respostas, $dispositivoInfo, $pdo){
            try {
            
            $comando = "INSERT INTO avaliacoes (id_dispositivo, id_pergunta, resposta, feedback_textual) 
                        VALUES (:id_dispositivo, :id_pergunta, :resposta, :feedback_textual)";
            $stmt = $pdo->prepare($comando);

            foreach ($respostas as $id_pergunta => $resposta) {
                $stmt->execute([
                    ':id_dispositivo' => $dispositivoInfo,
                    ':id_pergunta' => (int)$id_pergunta,
                    ':resposta' => (int)$resposta,     
                    ':feedback_textual' => $comentario
                ]);
            }

        } catch (PDOException $e) {
            die("Erro ao salvar a avaliação no banco de dados: " . $e->getMessage());
        }
        }

        $pdo = getDbConnection();

        $dadoslimpos = limpaDados();
        $comentarioAdd = $dadoslimpos['comentario_limpo'];
        $respostasInfo = $dadoslimpos['respostas_limpas'];
        $dispositivo = $dadoslimpos['dispositivo_limpo'];

        salvarAvaliacao($comentarioAdd, $respostasInfo, $dispositivo, $pdo);

        redirecionar(); 
    }
?>