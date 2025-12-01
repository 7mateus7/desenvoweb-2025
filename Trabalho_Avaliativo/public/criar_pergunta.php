<?php
    require_once('../src/session.php');
    require_once('../src/db.php');
    require_once('../src/html_criar_pergunta.php'); 

    $sessao = new Sessao();
    if(!$sessao->recuperaDados('usuario')){
        header('Location: login.php');
        exit;
    }

    $pdo = getDbConnection();

    $querySetores = "SELECT DISTINCT setor FROM dispositivos ORDER BY setor";
    $stmt = $pdo->query($querySetores);

    $listaSetores = $stmt->fetchAll(PDO::FETCH_COLUMN);

    function limpaDados(){
        $textoPergunta =  filter_input(INPUT_POST, 'textoPergunta', FILTER_SANITIZE_SPECIAL_CHARS);
        $statusInfo = $_POST['statusInfo'];
        $setorInfo = $_POST['setorInfo'];

        return ['textoPergunta' => $textoPergunta,
                'disponibilidade' => $statusInfo,
                'setor' => $setorInfo];
    }

    function InsereDados($textoPer, $disp, $setInfo, $pdo){
        try {
            $comando = 'INSERT INTO perguntas (texto_pergunta, status, setor) VALUES (:pergunta, :disponibilidade, :setor);';

            $stmt = $pdo->prepare($comando);

            $stmt->execute([':pergunta' => $textoPer,
                                'disponibilidade' => $disp,
                                'setor' => $setInfo]);

            header('Location: gerenciador_perguntas.php');
                exit;

        } catch (PDOException $e) {
            die("Erro ao salvar a avaliação no banco de dados: " . $e->getMessage());
        }
        
        }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $dadosLimpos = limpaDados();
        $textoPerguntaLimpa = $dadosLimpos['textoPergunta'];
        $disponibilidade = $dadosLimpos['disponibilidade'];
        $setorLimpo = $dadosLimpos['setor'];

        InsereDados($textoPerguntaLimpa, $disponibilidade, $setorLimpo, $pdo);
    }

    echo gerarFormularioPergunta($listaSetores);
?>