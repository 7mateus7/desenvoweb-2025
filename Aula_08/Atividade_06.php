<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prática 06 - MATRIZ</title>
</head>
<body>
    <h1>Prática 06 - Criação de Matriz</h1>
    <table border="2px">
        <td>Disciplina</td>
        <td>Faltas</td>
        <td>Média</td>
        <?php
            $matriz = [
                ["Programação Web", 5, 8.5],
                ["Estrutura de Dados", 2, 7.9],
                ["Banco de Dados 2", 0, 9.0],
                ["Engenharia de Software", 4, 8.0],
                ["Administração e Sistemas de Informação", 0, 10]
             ];

             echo "<h2>Apresentação Matriz</h2>";

             var_dump($matriz);

           foreach($matriz as $disciplina){
            echo "<tr>";
            for($i = 0; $i <=2; $i++)
                echo "<td>". $disciplina[$i] . "</td>";
           echo "</tr>";
        }
        ?>
    </table>
</body>
</html>