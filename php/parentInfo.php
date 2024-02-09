<?php
   $userID = $_SESSION["user_id"];

    $sql = "SELECT * FROM parents WHERE parent_id = $userID";
    $result = $conn->query($sql);

    if ($result->num_rows ==1) 
    {
        $userData = $result->fetch_assoc();
        $_SESSION['first_name'] = $userData["first_name"];
        $_SESSION['email'] = $userData["email"];
        $_SESSION['pass'] = $userData["pass"];
    }else
    {
        header("Location: parentIndex.php");
        exit();
    }
?>