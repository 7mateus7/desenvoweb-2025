<?php
    function quebraLinha(){
        echo "<br>";
    }
    
    function declaraArray(){ //FUNÇÃO PARA DECLARAR O ARRAY COM NOTAS E FALTAS
        $notas = array("10","9","8","7","6");
        $faltas = array("segunda-feira"=>"3", "terça-feira"=>"2", "quarta-feira"=>"0", "quinta-feira"=>"1", "sexta-feira"=>"5");

        return [$notas, $faltas];
    }

    function calculaMedia($notas){ //FUNÇÃO PARA CALCULAR A MÉDIA
        $numNotas = count($notas);

        $soma = 0;
        for($i = 0; $i < $numNotas; $i++){
           $soma = $soma + $notas[$i]; 
        };

        $media = $soma / $numNotas;
        return $media;
    }

    function aprovacao($media){ //FUNÇÃO PARA APRESENTAR A APROVAÇÃO
        if($media >= 7){
            echo "Parabéns :) Sua média é " . $media . " , por isso você está APROVADO!";
        }else{
            echo "Que pena :( Sua média é " . $media . ", por isso você está REPROVADO!";
        }
    }

    function calculaFrequencia($faltas){
        define("numAula", 100);

        $somaFaltas = 0;
        foreach($faltas as $chave => $valor){
            $somaFaltas = $somaFaltas + $valor;
        }
        
        $presencaAluno = numAula - $somaFaltas;
        $presencaFinal = ($presencaAluno / numAula) * 100;
        
        return $presencaFinal;
    }

    function frequencia($presenca){
       if($presenca >= 70){
        echo "Parabéns! Sua presença é maior que 70%. Por isso está aprovado.";
       }else{
        echo "Que Pena. Sua presença é menor que 70%. Por isso está reprovado.";
       }
    }

    [$varNotas, $varFaltas] = declaraArray();

    $mediaNotas = calculaMedia($varNotas);

    echo "A média das notas informada é de: $mediaNotas";

    quebraLinha();

    aprovacao($mediaNotas);

    $frequenciaFinal = calculaFrequencia($varFaltas);

    quebraLinha();

    echo "A frequencia final do aluno foi igual a " . number_format($frequenciaFinal, 2, ',', '.') . "%";

    quebraLinha();

    frequencia($frequenciaFinal);
?>