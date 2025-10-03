<?php
    require_once "funcoes.php";

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