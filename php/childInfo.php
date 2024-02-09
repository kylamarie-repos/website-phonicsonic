<?php
   $userID = $_SESSION["user_id"];

    $sql = "SELECT * FROM childs WHERE id = $userID";
    $result = $conn->query($sql);

    if ($result->num_rows ==1) 
    {
        $userData = $result->fetch_assoc();
        $_SESSION['user'] = $userData["user"];
        $_SESSION['parent_email'] = $userData["parent_email"];
        $_SESSION['pass'] = $userData["pass"];
        $_SESSION['class_name'] = $userData["class_name"];
    }
    else
    {
        header("Location: childIndex.php");
        exit();
    }
?>