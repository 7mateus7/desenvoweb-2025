<?php
    function coletaValores(){
        $valor01 = $_POST['valor01'];
        $valor02 = $_POST['valor02'];
        $valor03 = $_POST['valor03'];

        return [$valor01, $valor02, $valor03];
    }

    function somaValores($valor01, $valor02, $valor03){
        $soma = $valor01 + $valor02 + $valor03;

        return $soma;
    }

    function validarCor($v1, $v2, $v3){
        if ($v1 > 10){
            return $color = "blue";
        }elseif ($v2 < $v3){
            return $color = "green";
        }elseif($v3 < $v1 && $v3 < $v2){
            return $color = "red";
        }else{
            return $color = "black";
        }
    }

    $resultado = null;
    $cor = "black";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        list($num1, $num2, $num3) = coletaValores();
        
        $resultado = (int) somaValores($num1, $num2, $num3);

        $cor = validarCor($num1, $num2, $num3);
    }

    if ($resultado !== null){
        echo "<fieldset>";
        echo "<legend>RESULTADO</legend>";
        echo "<p>A soma dos valores <strong>". $num1 . " + " . $num2 . " + " . $num3 . "</strong> é igual a <strong><span style='color:" . $cor . ";'>" . $resultado . "</span></strong></p>";
        echo "</fieldset>";
        echo "<a href='/Aula_09-FOLHA-DE-EXERCICIOS/Atividade_01/Atividade_01.html'>RETORNAR</a>";
    }
?>
