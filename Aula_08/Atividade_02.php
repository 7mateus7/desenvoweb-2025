<?php
    $SALARIO_1 = 1000;
    $SALARIO_2 = 2000;

    $SALARIO_2 = $SALARIO_1;
    
    ++$SALARIO_2;

    $SALARIO_1 = $SALARIO_1 + ($SALARIO_1 * 0.1);
    
    echo "O valor do Salário 01 é igual a " . $SALARIO_1 . ". Já o valor do Salário 02 é igual a " . $SALARIO_2;
?>