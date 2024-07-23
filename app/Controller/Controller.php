<?php
require_once "../../config/db_connection.php";

function listAllUsers() {
    $conn = getDBConnnection();
    $result = $conn->query("SELECT * FROM users");
    $conn->close();
    return $result->fetch_all();
}

function getByIdUser($id) {
    if(empty($id))
        return false;
    $conn = getDBConnnection();
    $stmt = $conn->prepare("SELECT * FROM users where id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
    $conn->close();
    return $user;
}




?>

