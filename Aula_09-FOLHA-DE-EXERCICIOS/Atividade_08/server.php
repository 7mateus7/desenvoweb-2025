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
                    $vJuros = 1.5;
                    break;
                case 36:
                    $vJuros = 2.0;
                    break;
                case 48:
                    $vJuros = 2.5;
                    break;
                case 60:
                    $vJuros = 3.0;
                    break;
                default:
                    echo "Número de Parcelas Inválido";
                    break;
            }
            return $vJuros;
        }
        function calculoJuros($valorInformado, $tJuros, $numeroParcelas){
            $tDecimal = $tJuros / 100;

            $jurosTotal = ($valorInformado * $tDecimal)  * $numeroParcelas;

            return $jurosTotal;
        }

        function calculaMontante($valorInicial, $totalDeJuros){
            $montante = $valorInicial + $totalDeJuros;

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
        $totalJuros = calculoJuros($valor, $taxaJurosPercentual, $numParcelas);
        $montanteFinal = calculaMontante($valor, $totalJuros);
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
        echo "<a href='/Aula_09-FOLHA-DE-EXERCICIOS/Atividade_08/Atividade_08.html'>NOVO CALCULO</a>";
        echo "</fieldset>";
    }else{
        echo "Deu ruim.";
    }
?>