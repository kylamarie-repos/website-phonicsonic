<?php
session_start();
   $userID = $_SESSION["user_id"];

    $sql = "SELECT * FROM users WHERE id = $userID";
    $result = $conn->query($sql);

    if ($result->num_rows ==1) 
    {
        $userData = $result->fetch_assoc();
        $_SESSION['first_name'] = $userData["first_name"];
        $_SESSION['last_name'] = $userData["last_name"];
        $_SESSION['username'] = $userData["username"];
        $_SESSION['email'] = $userData["email"];
        $_SESSION['password'] = $userData["password"];
    }else
    {
        header("Location: index.php");
        exit();
    }
    $conn->close();
?>