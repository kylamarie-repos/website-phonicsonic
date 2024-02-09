<?php
    $class_name = $_SESSION["class_name"];

    $sql = "SELECT * FROM class WHERE class_name='$class_name'";
    $result = $conn->query($sql);

    if($result->num_rows == 1)
    {
        $classData = $result->fetch_assoc();
        $_SESSION["class_name"] = $classData["class_name"];
        $_SESSION["lesson_name"] = $classData["lesson_name"];

    }
    else
    {
        header("Location: childProfile.php");
        exit();
    }
?>