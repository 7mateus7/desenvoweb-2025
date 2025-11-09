<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        require_once('db.php');

        $pdo = getDbConnection();
        $comentarioAdd = filter_input(INPUT_POST, 'areaFeedback', FILTER_SANITIZE_SPECIAL_CHARS);
        $respostasInfo = $_POST['respostas'];
        $dispositivo = filter_input(INPUT_POST, 'id_dispositivo', FILTER_VALIDATE_INT);

        try {
            
            $comando = "INSERT INTO avaliacoes (id_dispositivo, id_pergunta, resposta, feedback_textual) 
                        VALUES (:id_dispositivo, :id_pergunta, :resposta, :feedback_textual)";
            $stmt = $pdo->prepare($comando);

            foreach ($respostasInfo as $id_pergunta => $resposta) {
                $stmt->execute([
                    ':id_dispositivo' => $dispositivo,
                    ':id_pergunta' => (int)$id_pergunta,
                    ':resposta' => (int)$resposta,     
                    ':feedback_textual' => $comentarioAdd
                ]);
            }

            header("Location: ../public/obrigado.html");
            exit; 

        } catch (PDOException $e) {
            die("Erro ao salvar a avaliação no banco de dados: " . $e->getMessage());
        }
    }
?>