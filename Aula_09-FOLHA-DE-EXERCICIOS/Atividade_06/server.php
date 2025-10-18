<?php 
    function coletaDados(){
        $vMelencia = (float) $_POST['melancia'] ;
        $vMaca = (float) $_POST['maca'];
        $vLaranja = (float) $_POST['laranja'];
        $vRepolho = (float) $_POST['repolho'];
        $vCenoura = (float) $_POST['cenoura'];
        $vBatata = (float) $_POST['batata'];
        
        return [$vMelencia, $vMaca, $vLaranja, $vRepolho, $vCenoura, $vBatata];
    }

    function valorGasto($vMelancia, $vMaca, $vLaranja, $vRepolho, $vCenoura, $vBatata){
        $totalMelancia = $vMelancia * 2;
        $totalMaca = $vMaca * 4;
        $totalLaranja = $vLaranja * 5;
        $totalRepolho = $vRepolho * 3;
        $totalCenoura = $vCenoura * 6;
        $totalBatata = $vBatata * 7;

        return [$totalMelancia, $totalMaca, $totalLaranja, $totalRepolho, $totalCenoura, $totalBatata];
    }

    function quebraLinha(){
        echo "<br>";
    }
    function soma($vMelancia, $vMaca, $vLaranja, $vRepolho, $vCenoura, $vBatata){
        $total = ($vMelancia + $vMaca + $vLaranja + $vRepolho + $vCenoura + $vBatata);
        return $total;
    }

    function validaCor($valor){
        if($valor == 50){
            return $infoCor = "green";
        }elseif($valor > 50){
            return $infoCor = "red";
        }else{
            return $infoCor = "blue";
        }
    }

    function mensagem($infoCor, $valor){
        if($valor == 50){
            echo "<p style='color: $infoCor'>Parabéns. O valor da compra é igual a R$$valor</p>";
        }elseif($valor < 50){
            $diferenca = 50 - $valor;
            echo "<p style='color:$infoCor'>O valor da sua compra é igual a R$$valor. Ainda lhe restam R$$diferenca</p>";
        }else{
            $diferenca = $valor - 50;
            echo "<p style='color:$infoCor'>O valor da sua compra é igual a R$$valor. Está faltando R$$diferenca</p>";
        }
    }

    list($melancia, $maca, $laranja, $repolho, $cenoura, $batata) = coletaDados();
    list($valorMelancia, $valorMaca, $valorLaranja, $valorRepolho, $valorCenoura, $valorBatata) = valorGasto($melancia, $maca, $laranja, $repolho, $cenoura, $batata);
    $somaFinal = soma($valorMelancia, $valorMaca, $valorLaranja, $valorRepolho, $valorCenoura, $valorBatata);
    $cor = validaCor($somaFinal);

    echo "<fieldset>";
    echo "<legend>Total Gasto</legend>"; 
    echo "🍉Melancia: ". $valorMelancia;  
    quebraLinha();
    echo "🍏Maça: " . $valorMaca;
    quebraLinha();
    echo "🍊Laranja: ". $valorLaranja;
    quebraLinha();
    echo "🥬Repolho " . $valorRepolho;
    quebraLinha();
    echo "🥕Cenoura: ". $valorCenoura;
    quebraLinha();
    echo "🥔Batata: " . $valorBatata;
    quebraLinha();
    echo "<p><strong>Total R$$somaFinal</strong></p>";
    mensagem($cor, $somaFinal);
    echo "<a href='/Aula_09-FOLHA-DE-EXERCICIOS/Atividade_06/Atividade_06.html'>RETORNAR</a>";     
    echo "</fieldset>";
?>