<?php 
    $connectionString = "host=localhost port=5432 dbname=local user=postgres password=123456";
    $connection = pg_connect($connectionString);

    if($connection){
        $result = pg_query($connection, 'SELECT * FROM TBPESSOA');

        if($result){
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>Código</th>";
            echo "<th>Nome</th>";
            echo "<th>Sobrenome</th>";
            echo "<th>E-mail</th>";
            echo "<th>Senha</th>";
            echo "<th>Cidade</th>";
            echo "<th>Estado</th>";
            echo "</tr>";

            $row = pg_fetch_assoc($result);

            while($row){
                echo "<tr>";
                echo "<td>". $row['pescodigo'] . "</td>";
                echo "<td>". $row['pesnome'] . "</td>";
                echo "<td>". $row['pessobrenome'] . "</td>";
                echo "<td>". $row['pesemail'] . "</td>";
                echo "<td>". $row['pespassword'] . "</td>";
                echo "<td>". $row['pescidade'] . "</td>";
                echo "<td>". $row['pesestado'] . "</td>";
                echo "</tr>";
                $row = pg_fetch_assoc($result);
            }
            echo "</table>";
        }
    }
?>