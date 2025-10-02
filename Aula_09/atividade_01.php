<?php
    function quebraLinha(){
        echo "<br>";
    }
    
    function declaraArray(){ //FUNÇÃO PARA DECLARAR O ARRAY COM NOTAS E FALTAS
        $notas = array("10","9","8","7","6");
        $faltas = array("segunda-feira"=>"0", "terça-feira"=>"0", "quarta-feira"=>"0", "quinta-feira"=>"0", "sexta-feira"=>"0");

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
            return TRUE;
        }else{
            return FALSE;
        }
    }

    function mensagem($situacao){ //APRESENTA A SITUAÇÃO FINAL DO ALUNO
        echo "Você está " . $situacao;
    }

    function calculaFrequencia($faltas){
        $numAula = count($faltas);

        $somaFaltas = 0;
        foreach($faltas as $chave => $valor){
            $somaFaltas = $somaFaltas + $valor;
        }
        
        $presencaAluno = $numAula - $somaFaltas;
        $presencaFinal = ($presencaAluno / $numAula) * 100;
        
        return $presencaFinal;
    }

    function frequencia($presenca){
       if($presenca >= 70){
        return TRUE;
       }else{
        return FALSE;
       }
    }

    [$varNotas, $varFaltas] = declaraArray(); //CHAMA FUNÇÃO PARA DECLARAR OS ARRAYS

    $mediaNotas = calculaMedia($varNotas); //FUNÇÃO PARA CALCULAR A MÉDIA

    echo "A média das notas informada é de: $mediaNotas";

    quebraLinha();

    if($mediaFinal =$mediaFinal = aprovacao($mediaNotas)){ //APRESENTA A SITUAÇÃO (APROVADO OU REPROVADO)
        mensagem("Aprovado");
    }else{
        mensagem("Reprovado");
    }

    $frequenciaFinal = calculaFrequencia($varFaltas);

    quebraLinha();

    echo "A frequencia final do aluno foi igual a " . number_format($frequenciaFinal, 2, ',', '.') . "%";

    quebraLinha();

    if($situacaoFrequencia = frequencia($frequenciaFinal)){ //APRESENTA A SITUAÇÃO (APROVADO OU REPROVADO)
        mensagem("Aprovado");
    }else{
        mensagem("Reprovado");
    }
?>