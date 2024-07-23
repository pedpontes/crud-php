<?php 
    define('DB_HOST', 'localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','loja');

    function getDBConnnection(){
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if($conn->connect_error){
            die("Conexão falhou: " . $conn->connect_error);
        }
        return $conn;
    }
?>