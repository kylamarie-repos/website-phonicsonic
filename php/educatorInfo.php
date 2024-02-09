<?php
    $userID = $_SESSION["user_id"];

    $sql = "SELECT * FROM educators WHERE id = $userID";
    $result = $conn->query($sql);

    if ($result->num_rows ==1) 
    {
        $userData = $result->fetch_assoc();
        $_SESSION['email'] = $userData["email"];
        $_SESSION['pass'] = $userData["pass"];
        $_SESSION['class_name'] = $userData["class_name"];
        $_SESSION['centre'] = $userData["centre"];
    }else
    {
        header("Location: educatorIndex.php");
        exit();
    }
?>