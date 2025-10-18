<?php
    session_start();

    if(isset($_SESSION['usuario'])){
        echo "Usuário = " . $_SESSION['usuario'];
        echo "Senha = " . $_SESSION['pass'];
    }

     echo "<a href='login.html'>RETORNAR Arquivo Login.html</a>"
?>