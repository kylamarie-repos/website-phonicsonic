<?php
    $parent_email = $_SESSION["parent_email"];

    $sql = "SELECT * FROM parent_lesson WHERE email='$parent_email'";
    $result = $conn->query($sql);

    if($result->num_rows == 1)
    {
        $lessonData = $result->fetch_assoc();
        $_SESSION["lesson_name"] = $lessonData["lesson_name"];
    }
    else
    {
        header("Location: childProfile.php");
        exit();
    }
?>