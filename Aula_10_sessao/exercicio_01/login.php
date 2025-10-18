<?php
    session_start();
    
    if(!isset($_SESSION['usuario'])){
        $_SESSION['usuario'] = $_POST['user'];
        $_SESSION['pass'] = $_POST['pass'];

        echo "Usuário definido com sucesso";
    }else{
        echo "Usuário já definido";
    }
    
    echo "<a href='login.html'>RETORNAR</a>"
?>