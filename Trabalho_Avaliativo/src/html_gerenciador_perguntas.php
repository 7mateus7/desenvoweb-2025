<?php 
    require_once('../src/db.php');

    function gerarTabelaPerguntas(){
        $pdo = getDbConnection();
        $consultaLeitura = "SELECT * FROM perguntas ORDER BY 1,4";

        $stmt = $pdo->query($consultaLeitura);
        $perguntas_geradas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $htmlPerguntas = "<table class='tabela-perguntas'>";
        $htmlPerguntas .= "<thead>";
        $htmlPerguntas .= "<tr>";
        $htmlPerguntas .= "<th>ID</th>";
        $htmlPerguntas .= "<th>PERGUNTA</th>";
        $htmlPerguntas .= "<th>SITUAÇÃO</th>";
        $htmlPerguntas .= "<th>SETOR</th>";
        $htmlPerguntas .= "<th>AÇÕES</th>";
        $htmlPerguntas .= "</tr>";
        $htmlPerguntas .= "</thead>";
        $htmlPerguntas .= "<tbody>";
        foreach ($perguntas_geradas as $item) {
           switch($item['status']){
                case 1:
                    $status = "<span style='color: green; font-weight: bold;'>Ativo</span>";
                    break;
                case 0:
                    $status = "<span style='color: red; font-weight: bold;'>Desativo</span>";
                    break;
                default:
                    $status = "Desconhecido";
        }
            $htmlPerguntas .= "<tr>";
            $htmlPerguntas .= "<td>".$item['id_pergunta']."</td>";
            $htmlPerguntas .= "<td>".$item['texto_pergunta']."</td>";
            $htmlPerguntas .= "<td>".$status."</td>";
            $htmlPerguntas .= "<td>".$item['setor']."</td>";
            $htmlPerguntas .= "<td> <a href='editar.php?id=".$item['id_pergunta']."'>Editar</a> 
                                    <a href='excluir.php?id=".$item['id_pergunta']."' onclick='return confirm(\"Tem certeza que deseja excluir?\");'>Excluir</a>";
            $htmlPerguntas .= "</tr>";
        }
        $htmlPerguntas .= "</tbody>";
        $htmlPerguntas .= "</table>";

        return $htmlPerguntas;
    }

    function gerarMensagemErro(){
    $htmlErro = '<div class="alerta-erro">
                    <div class="icone">✖</div> 
                    <div>
                        <strong>Não foi possível excluir</strong>
                        <span>Esta pergunta possui respostas vinculadas e não pode ser removida.</span>
                    </div>
                </div>';

    return $htmlErro;
}
?>