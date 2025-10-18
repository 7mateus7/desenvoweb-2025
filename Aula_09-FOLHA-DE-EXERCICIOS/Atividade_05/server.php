<?php
    function coletaDados(){
        $b = $_POST['baseInfo'];
        $a = $_POST['alturaInfo'];
        return [$b, $a];
    }

    function calculo($baseInfo, $alturaInfo){
        $result = ($baseInfo * $alturaInfo) / 2;

        return $result;
    }

    function quebraLInha(){
        echo "<br>";
    }

    list($base, $altura) = coletaDados();
    $resultado = calculo($base, $altura);

    echo "<fieldset>";
    echo "<legend>RESULTADO</legend>";
    echo "A formulá para o calculo da Área do Triângulo Retângulo é BASE x ALTURA / 2";
    quebraLInha();
    echo "Resultado: ";
    echo $base . " x " . $altura . " / 2 = " . $resultado;
    quebraLInha();
    echo "<a href='/Aula_09-FOLHA-DE-EXERCICIOS/Atividade_05/Atividade_05.html'>NOVO CALCULO</a>";
    echo "</fieldset>";
?>