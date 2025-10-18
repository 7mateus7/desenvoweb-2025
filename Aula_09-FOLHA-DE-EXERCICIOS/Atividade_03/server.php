<?php
    function coletaValores(){
        $areaInfo = $_POST['area'];
        
        return (int) $areaInfo;
    }

    function calculoArea($valorInfo){
        $areaQ = $valorInfo**2;

        return $areaQ;
    }

    if ($_SERVER["REQUEST_METHOD"]){
        $areaInformada = coletaValores();

        $areaQuadrado = calculoArea($areaInformada);
    }

    echo "<fieldset>";
        echo "<legend>RESULTADO:</legend>";
        echo "<p>O lado do quadrado informado é igual a ". $areaInformada . " METROS</p>";
        echo "<p>A área do quadrado corresponde a " . $areaQuadrado . " METROS QUADRADOS</p>";
        echo "<h3>Formula = LxL</h3>";
        echo "<a href='/Aula_09-FOLHA-DE-EXERCICIOS/Atividade_03/Atividade_03.html'>RETORNAR</a>";
    echo "</fieldset>";
?>
