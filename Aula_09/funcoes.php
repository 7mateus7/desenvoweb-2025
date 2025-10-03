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
?>