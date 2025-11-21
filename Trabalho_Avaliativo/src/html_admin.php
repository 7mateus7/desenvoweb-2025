<?php 
    require_once('db.php');

    function geraHtmlDashboard($pdo){
        $consulta_media = "SELECT id_pergunta, per.texto_pergunta, AVG(resposta) as media FROM avaliacoes JOIN perguntas per USING(id_pergunta) GROUP BY 1,2";

        $stmt = $pdo->query($consulta_media);
        $medias = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $htmlForm = '<table>';
        $htmlForm .= "<thead class='linha-cabecalho'>";
        $htmlForm .= "<tr>";
        $htmlForm .= "<th>ID</th>";
        $htmlForm .= "<th>PERGUNTA</th>";
        $htmlForm .= "<th>MÉDIA</th>";
        $htmlForm .= "</tr>";
        $htmlForm .= "</thead>"; 
        $htmlForm .= "<tbody class='corpo-tabela'>";
        foreach($medias as $media){
            $htmlForm .= "<tr>";
            $htmlForm .= "<td>".$media['id_pergunta']."</td>";
            $htmlForm .= "<td>".$media['texto_pergunta']."</td>";
            $htmlForm .= "<td>".number_format($media['media'], 2, ".", ",")."</td>";
            $htmlForm .= "</tr>";
        }

        $htmlForm .= "</tbody>";
        $htmlForm .= "</table>";

        return $htmlForm;
    }
?>