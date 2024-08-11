<?php 
    define('DB_HOST', 'localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','loja');
    define('DB_PORT', '3306');

    function getDBConnnection(){
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
        if($conn->connect_error){
            die("Conexão falhou: " . $conn->connect_error);
        }
        return $conn;
    }
?>