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
        
        $resultado = somaValores($num1, $num2, $num3);

        $cor = validarCor($num1, $num2, $num3);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade 01</title>
</head>
<body>
    <form action="<?=($_SERVER["PHP_SELF"])?>" method="POST">
        <fieldset>
            <legend>SOMAR NÚMEROS</legend>
                <label for="numero01">VALOR 01</label>
                <input type="number" name="valor01" id="">

                <label for="">VALOR 02</label>
                <input type="number" name="valor02" id="">

                <label for="">VALOR 03</label>
                <input type="number" name="valor03" id="">    
                
                <input type="submit" value="ENVIAR">

        </fieldset>
    </form>
    
    <br>

    <?php if ($resultado !== null)?>
    <fieldset>
        <legend>RESULTADO</legend>
        <p>A soma dos valores <strong> <?php echo $num1 . " + " . $num2 . " + " . $num3 ?></strong> é igual a <strong><span style = "color: <?=$cor?>;"> <?= $resultado?> </span></strong> </p>
    </fieldset>
    
</body>
</html>
