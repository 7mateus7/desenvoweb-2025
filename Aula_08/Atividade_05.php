<?php
    $professor = array("Cleber", "Jullian", "Fernando");
    $disciplina = array("Programação Web", "Engenharia de Software", "Estrutura de Dados");
     
     For($i = 0; $i < count($professor); $i++){
        echo "Professor " . $professor[$i] . " ->  Disciplina " . $disciplina[$i];
        echo "<br>";
     }
?>

<?php
    echo "<br>";
    $idade = array("João"=>"35", "Maria"=>"17", "Mateus"=>"21");
    foreach($idade as $chave => $valor){
        echo "Nome= " . $chave . " -> Idade= ". $valor;
        echo "<br>";
    }
?>