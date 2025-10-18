<?php
    function coletaNumero(){
        $numeroInformado = $_POST['numero'];

        return $numeroInformado;
    }

    function validaNumero($num){
        if ($num % 2 == 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    function mensagem($condi){
        if ($condi === TRUE){
            return $msg = "Valor Divisível por 2";
        }else{
            return $msg = "O valor NÃO é divisível por 2";
        }
    }

    $exibeMensagem = null;
    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $numeroInfo = (int) coletaNumero();

        $numeroValidado = validaNumero($numeroInfo);

        $exibeMensagem = mensagem($numeroValidado);
    }
    
    if($exibeMensagem !== null){
        echo "<fieldset>";
            echo "<legend>RESULTADO:</legend>";
            echo "<p>". $exibeMensagem . " </p>";
        echo "</fieldset>";
        echo "<a href='/Aula_09-FOLHA-DE-EXERCICIOS/Atividade_02/Atividade_02.html'>RETORNAR</a>";
    }
?>