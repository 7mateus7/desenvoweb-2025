<?php
    require_once('session.php');
    require_once('db.php');

    $sessao = new Sessao();
    if (!$sessao->recuperaDados('usuario')) {
        header('Location: login.html');
        exit;
    }

    $objUsuario = $sessao->getUsuario();
    $nomeUsuario = $objUsuario ? $objUsuario->getUserName() : 'Admin';

    $pdo = getDbConnection();

    $filtroId = filter_input(INPUT_GET, 'filtro_id', FILTER_VALIDATE_INT);

    $stmtFiltro = $pdo->query("SELECT id_dispositivo, nome_dispositivo FROM dispositivos ORDER BY nome_dispositivo");
    $listaParaMenu = $stmtFiltro->fetchAll(PDO::FETCH_ASSOC);

    $sqlMedias = "SELECT id_pergunta, per.texto_pergunta, AVG(resposta) as media 
                FROM avaliacoes 
                JOIN perguntas per USING(id_pergunta)";

    if ($filtroId) {
        $sqlMedias .= " WHERE avaliacoes.id_dispositivo = :id_filtro ";
    }

    $sqlMedias .= " GROUP BY 1,2 ORDER BY id_pergunta";

    $stmt = $pdo->prepare($sqlMedias);

    if ($filtroId) {
        $stmt->execute([':id_filtro' => $filtroId]);
    } else {
        $stmt->execute();
    }

    $medias = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>