<?php
    function coletaDados(){
        $baseInfo = $_POST['baseInfo'];
        $alturaInfo = $_POST['alturaInfo'];

        return [$baseInfo, $alturaInfo];
        }
    
    function calculoArea($baseInformada, $alturaInformada){
        $areaTotal = $baseInformada * $alturaInformada;
        
        return $areaTotal;
    }

    function quebraLinha(){
        echo "<br>";
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        list($base, $altura) = coletaDados();

        $area = (int) calculoArea($base, $altura);

        echo "<fieldset>";
        echo "<legend>RESULTADO</legend>";
        echo "<p>A formula para calcular a área do retângulo é igual a BASE x ALTURA</p>";
        quebraLinha();
        echo "Base Informada = " . $base;
        quebraLinha();
        echo "Altura Informada = " .$altura;
        quebraLinha();
        echo "Área total igual a <strong> " . $area . "</strong>";
        quebraLinha();
        echo "<a href='/Aula_09-FOLHA-DE-EXERCICIOS/Atividade_04/Atividade_04.html'>RETORNAR</a>";
    }
?>