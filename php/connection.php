<?php
    $servername = "localhost";
    $username = "30032342";
    $password = "test";
    $db_name = "people";
    $conn = new mysqli($servername, $username, $password, $db_name, 3306);
    if($conn->connect_error)
    {
        die("Connection failed".$conn->connect_error);
    }
?>

