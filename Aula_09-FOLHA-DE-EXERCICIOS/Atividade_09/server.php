<?php  
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        function coletaDados(){
            $parcelasInfo =(int)$_POST['parcela'];
            $valorInfo =(float)$_POST['infoValor'];

            return [$parcelasInfo, $valorInfo];
        }

        function validaJuros($nParcelas){
            switch($nParcelas){
                case 24:
                    $vJuros = 2.0;
                    break;
                case 36:
                    $vJuros = 2.3;
                    break;
                case 48:
                    $vJuros = 2.6;
                    break;
                case 60:
                    $vJuros = 2.9;
                    break;
                default:
                    echo "Número de Parcelas Inválido";
                    break;
            }
            return $vJuros;
        }

        function calculaMontante($valorInicial, $totalDeJuros, $tempo){
            $tDecimal = $totalDeJuros / 100;
            $base = 1 + $tDecimal;
            $potencia = $base ** $tempo;
            $montante = $valorInicial * $potencia;

            return $montante;
        }

        function calculaParcelas($monFinal, $numeParcelas){
            $valueParcelas = $monFinal / $numeParcelas;
            
            return $valueParcelas;
        }

        function quebraLinha(){
            echo "<br>";
        }

        list($numParcelas, $valor) = coletaDados();
        $taxaJurosPercentual = validaJuros($numParcelas);
        $montanteFinal = calculaMontante($valor, $taxaJurosPercentual, $numParcelas);
        $valorPacelas = calculaParcelas($montanteFinal, $numParcelas);

        echo "<fieldset>";
        echo "<legend>Resultado:</legend>";
        echo "🏍️Valor Informado: " . number_format($valor, 2, ',', '.');
        quebraLinha();
        echo "⌚Número de Parcelas: " . $numParcelas;
        quebraLinha();
        echo "💸Montante Final: " . number_format($montanteFinal, 2, ',', '.');
        quebraLinha();
        echo "💰Valor dar parcelas: " . number_format($valorPacelas, 2,',', '.');
        quebraLinha();
        echo "<a href='/Aula_09-FOLHA-DE-EXERCICIOS/Atividade_09/Atividade_09.html'>NOVO CALCULO</a>";
        echo "</fieldset>";
    }else{
        echo "Deu ruim.";
    }
?>