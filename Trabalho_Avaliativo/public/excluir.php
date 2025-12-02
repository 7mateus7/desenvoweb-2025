<?php 
    require_once('../src/session.php');
    require_once('../src/db.php');

    $sessao = new Sessao();
    if(!$sessao->recuperaDados('usuario')){
        header('Location: login.php');
        exit;
    }

    function coletaUrl(){
        $id_url = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $id_dispositivo = $id_url;

        return $id_dispositivo;
    }

    function deletarPergunta($idPergunta, $pdo){
        try{
            $consultaDeletar = "DELETE FROM perguntas WHERE id_pergunta = :id";

            $stmt = $pdo->prepare($consultaDeletar);

            $stmt->execute(['id' => $idPergunta]);

            header('Location: gerenciador_perguntas.php');
            exit;
        }catch(PDOException $e) {
            $erro = $e->getCode();
            if($erro == '23503'){
                header('Location: gerenciador_perguntas.php?erro=tem_respostas');
                exit;
            }else{
                die("Erro ao salvar a avaliação no banco de dados: " . $e->getMessage());
            }

        }
    }

    $pdo = getDbConnection();
    $id = coletaUrl();
    if($id){
        deletarPergunta($id, $pdo);
    }else{
        header('Location: gerenciador_perguntas.php');
        exit;
    }
?>