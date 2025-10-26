<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        function coletaDados(){
            $infoNome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $infoSobrenome =filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $infoemail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $infoSenha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $infoCidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $infoEstado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            return [$infoNome, $infoSobrenome, $infoemail, $infoSenha, $infoCidade, $infoEstado];
        }
        $connectionString = "host=localhost port=5432 dbname=local user=postgres password=123456";
        $connection = pg_connect($connectionString);

        if($connection){
            echo "Database conectado com sucesso!";
            echo "<br>";

            $aDadosPessoa = coletaDados();

            $resultInsert = pg_query_params($connection, 'INSERT INTO TBPESSOA (pesnome, pessobrenome, pesemail, pespassword, pescidade, pesestado)  VALUES ($1, $2, $3, $4, $5, $6)', $aDadosPessoa);

            if($resultInsert){
                echo "DADOS INSERIDOS COM SUCESSO! 😃";
            }else{
                echo "NÃO FOI POSSÍVEL INSERIR DADOS 🥹";
            }
        }else{
            echo "Não foi possível se conectar ao banco";
        }

        echo "<a href='/Aula_11/Exercicios/Exercicio_01.html'>RETORNAR</a>";
    }
?>