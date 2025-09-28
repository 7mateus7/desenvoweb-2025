<?php
    $SALARIO_1 = 0;
    $SALARIO_2 = 0;
    
   if ($SALARIO_1 > $SALARIO_2) {
        echo "O Valor da variável 1 (".$SALARIO_1.") é maior que o valor da variável 2 (". $SALARIO_2 . ")";
   } elseif ($SALARIO_1 < $SALARIO_2) {
        echo "O Valor da variável 1 (".$SALARIO_1.") é menor que o valor da variável 2 (". $SALARIO_2 . ")";
   } else {
        echo "Os valores são iguais";
   }

   for ($x = 0; $x <=100; $x++){
        if ($x == 50){
            break;
        }
        else {
            $SALARIO_1++;
        }
   }
    if ($SALARIO_1 > $SALARIO_2) {
        echo "<br> O valor do Salário 01 é igual a " . $SALARIO_1;
    } else {
        echo "<br> O valor do Salário 02 é igual a " . $SALARIO_2;
    }
?>  