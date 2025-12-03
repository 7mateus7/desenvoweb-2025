'<?php 
    require_once('../src/session.php');
    require_once('../src/db.php');
    require_once('../src/html_editar_perguntas.php'); 

    $sessao = new Sessao();
    if(!$sessao->recuperaDados('usuario')){
        header('Location: login.html');
        exit;
    }

    $pdo = getDbConnection();

    function limpaDados(){
        $id = $_POST['id']; 
        $textoPergunta =  filter_input(INPUT_POST, 'textoPergunta', FILTER_SANITIZE_SPECIAL_CHARS);
        $statusInfo = $_POST['statusInfo'];
        $setorInfo = $_POST['setorInfo'];

        return ['id' => $id,
                'textoPergunta' => $textoPergunta,
                'disponibilidade' => $statusInfo,
                'setor' => $setorInfo];        
    }
    
    function atualizarDados($idPergunta, $txtPergunta, $statusPergunta, $setorPergunta, $pdo){
        $sqlUpdate = "UPDATE perguntas SET texto_pergunta = :texto_pergunta, status = :status, setor = :setor WHERE id_pergunta = :id_pergunta";

        $stmt = $pdo->prepare($sqlUpdate);

        $stmt->execute([
            ':texto_pergunta' => $txtPergunta,
            ':status' => $statusPergunta,
            ':setor' => $setorPergunta,
            'id_pergunta' => $idPergunta
        ]);
    };

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $dadosLimpos = limpaDados();
        $id = $dadosLimpos['id'];
        $perguntaInfo = $dadosLimpos['textoPergunta'];
        $status = $dadosLimpos['disponibilidade'];
        $setor = $dadosLimpos['setor'];

       atualizarDados($id, $perguntaInfo, $status, $setor, $pdo);

       header('Location: gerenciador_perguntas.php'); 
       exit;
    }

    function coletaURL(){
        $id_url = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $idPergunta = $id_url;

        return $idPergunta;
    }
    $idPergunta = coletaURL();

    $consultaSqlPerguntas = "SELECT * FROM perguntas WHERE id_pergunta = :id_pergunta";
    $smtp = $pdo->prepare($consultaSqlPerguntas);
    $smtp->execute(['id_pergunta' => $idPergunta]);

    $pergunta = $smtp->fetch(PDO::FETCH_ASSOC);

    $querySetores = "SELECT DISTINCT setor FROM dispositivos ORDER BY setor";
    $stmt = $pdo->query($querySetores);

    $listaSetores = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    echo gerarFormularioPergunta($listaSetores, $pergunta);

?>