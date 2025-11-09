<?php 
    require_once('../config.php');
    
    function getDbConnection(){
        $connection = "pgsql:host=". DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME;
        try {
            $PDO = new PDO($connection, DB_USER, DB_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            return $PDO;
        } catch (PDOException $e) {
            die("Não foi possível realizar a conexação com o banco!" . " <br> Erro: " . $e->getMessage());
        }
    }
?>