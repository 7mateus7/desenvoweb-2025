<?php
    session_start();
    
    if(!isset($_SESSION['usuario'])){
        $_SESSION['usuario'] = $_POST['user'];
        $_SESSION['pass'] = $_POST['pass'];
        $_SESSION['data_inicio'] = date('Y-m-d');

        setcookie("usuario", $_SESSION['usuario'], time() + (86400 * 30), "/");
        setcookie("data_inicio", $_SESSION['data_inicio'], time() + (86400 * 30), "/");

        echo $_COOKIE['usuario'];
    }else{
       
    }

    if(isset($_COOKIE['usuario'])){
        echo "Usuário = " . $_COOKIE['usuario'];
        echo "<br>";
        echo "Data Início= " . $_COOKIE['data_inicio'];
        
    }else{
        echo "ATENÇÃO!! OS DADOS DA SESSÃO FORAM PERDIDOS";
    }
    
    echo "<a href='/Aula_10_sessao/exercicio_02/login.html'>RETORNAR</a>"
?>