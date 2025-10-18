<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        function coletaDados(){
            $infoNome = $_POST['nome'];
            $infoSobrenome = $_POST['sobrenome'];
            $infoemail = $_POST['email'];
            $infoSenha = $_POST['senha'];
            $infoCidade = $_POST['cidade'];
            $infoEstado = $_POST['estado'];

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

        echo "<a href='/Aula_11/Exercicio)01.html'>RETORNAR</a>";
    }
?>