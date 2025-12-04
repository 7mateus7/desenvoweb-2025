<?php 
    require_once('../src/html_admin.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    <link rel="stylesheet" href="css/style_dashboard.css">
</head>
<body>

    <div class="container">
        
        <div class="container-logout">
            Olá, <strong><?php echo htmlspecialchars($nomeUsuario); ?></strong>
            <a href="logout.php" class="link-logout">Sair</a>
        </div>

        <h1>Dashboard</h1>

        <div class="filtro-container">
            <form action="admin.php" method="GET">
                <label for="filtro_id"><strong>Filtrar por Dispositivo:</strong></label>
                <select name="filtro_id" id="filtro_id" onchange="this.form.submit()">
                    <option value="">Todos os Dispositivos</option>
                    
                    <?php if (!empty($listaParaMenu)): ?>
                        <?php foreach ($listaParaMenu as $item): ?>
                            <?php 
                                $filtroAtual = isset($filtroId) ? $filtroId : '';
                                $selected = ($item['id_dispositivo'] == $filtroAtual) ? 'selected' : ''; 
                            ?>
                            <option value="<?php echo $item['id_dispositivo']; ?>" <?php echo $selected; ?>>
                                <?php echo htmlspecialchars($item['nome_dispositivo']); ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    
                </select>
            </form>
        </div>

        <table class="tabela-perguntas">
            <thead>
                <tr>
                    <th class="col-id">ID</th>
                    <th>PERGUNTA</th>
                    <th class="col-media">MÉDIA</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($medias) && count($medias) > 0): ?>
                    <?php foreach ($medias as $dado): ?>
                        <tr>
                            <td><?php echo $dado['id_pergunta']; ?></td>
                            <td><?php echo htmlspecialchars($dado['texto_pergunta']); ?></td>
                            <td>
                                <?php 
                                    $nota = $dado['media'];
                                    $classeNota = 'nota-baixa';  
                                    
                                    if ($nota >= 7) {
                                        $classeNota = 'nota-alta'; 
                                    } elseif ($nota >= 5) {
                                        $classeNota = 'nota-media'; 
                                    }
                                ?>
                                <strong class="<?php echo $classeNota; ?>">
                                    <?php echo number_format($dado['media'], 2, ',', '.'); ?>
                                </strong>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="mensagem-vazia">
                            Nenhuma avaliação encontrada para este filtro.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

    </div>
</body>
</html>