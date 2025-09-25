<?php
    $SALARIO_1 = 2000;
    $SALARIO_2 = 2000;
    
   if ($SALARIO_1 > $SALARIO_2) {
        echo "O Valor da variável 1 (".$SALARIO_1.") é maior que o valor da variável 2 (". $SALARIO_2 . ")";
   } elseif ($SALARIO_1 < $SALARIO_2) {
        echo "O Valor da variável 1 (".$SALARIO_1.") é menor que o valor da variável 2 (". $SALARIO_2 . ")";
   } else {
        echo "Os valores são iguais";
   }
?>  