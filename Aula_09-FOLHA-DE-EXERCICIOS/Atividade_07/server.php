    <?php
        function coletaDados(){
            $valorCarroStr = $_POST['valorCarro'];
            $valorParcelaStr = $_POST['infoMensalidade'];

            $valorCarroFormatado = str_replace(',', '.', $valorCarroStr);
            $valorParcelaFormatado = str_replace(',', '.', $valorParcelaStr);

            $vCarro = (float) $valorCarroFormatado;
            $vParcela = (float) $valorParcelaFormatado;
        
            $vMensalidade = (int) $_POST['infoParcelas'];

             return [$vCarro, $vParcela, $vMensalidade];
        }

        function somaParcelas($valorParcelas, $nParcelas){
            $vFinal = $valorParcelas * $nParcelas;
            return $vFinal;
        }

        function diferenca($vPago, $vCarro){
            $dif = $vCarro - $vPago;
            return abs($dif);
        }

        function quebraLinha(){
            echo "<br>";
        }

        list($valorCarro, $valorParcelas, $numMensalidades) = coletaDados();
        $valorFinal = somaParcelas($valorParcelas, $numMensalidades);
        $vDiferenca = diferenca($valorFinal, $valorCarro);

        echo  "<fieldset>";
        echo "<legend>RESULTADO DOS JUROS</legend>";
        echo "🏎️ Valor do carro: R$". number_format($valorCarro, 2, ',', '.');
        quebraLinha();
        echo "💸Valor da Parcela: R$". number_format($valorParcelas, 2, ',', '.');
        quebraLinha();
        echo "⌚Número de Parcelas: " . $numMensalidades;
        quebraLinha();
        echo "💰Valor pago ao final: R$ " . number_format($valorFinal, 2, ',', '.');
        quebraLinha();
        echo "<strong>DIFERENÇA DE R$" . number_format($vDiferenca, 2, ',', '.') . "</strong>";
        quebraLinha();
        echo "<a href='/Aula_09-FOLHA-DE-EXERCICIOS/Atividade_07/Atividade_07.html'>RETORNAR</a>";
        echo  "</fieldset>";
    ?>