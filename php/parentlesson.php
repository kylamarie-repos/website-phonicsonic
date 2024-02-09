<?php
    session_start();
    require("connection.php");
    require("parentCrud/parentconnection.php");
    include("childheader.php");

    include('childInfo.php');
        $userData = $result->fetch_assoc();
        $parent_email = $_SESSION["parent_email"];
        $user = $_SESSION["user"];
        $pass = $_SESSION["pass"];
        $class_name = $_SESSION["class_name"];    

    include("parentlessoninfo.php");
        $classData = $result->fetch_assoc();
        $lesson_name = $_SESSION["lesson_name"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parent Lesson</title>
</head>
<body class="container">
    <div class="container fluid mb-3 p-4 mt-2 shadow rounded bg-white">
    <button class="btn d-flex float-start" onclick="history.back()" id="back-btn"><img src="../images/double-left.png" alt="back-btn" onmouseover="backOnHover(this)" onmouseout="backOffHover(this)" /></button>
        <br>
        <h3 class="text-center">Parent Lesson:</h3>
        <br><br>
        
        <?php
            $lesson_check_query = "SELECT * FROM lessons WHERE lesson_name='$lesson_name' LIMIT 1";
            $lessonResult = mysqli_query($conn, $lesson_check_query);
            $lessonData = mysqli_fetch_assoc($lessonResult);

            echo "
                <h2 class='card-title'>{$lessonData['lesson_name']}</h2>
                <br>
                <iframe width='560' height='315' src='{$lessonData['video']}' title='YouTube video player' frameborder='0' allow='accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen></iframe>
                <h5>Printable worksheet:</h5>
                <a href='crud/crudimages/worksheets/{$lessonData['worksheet']}' download><img id='downloadImage' src='crud/crudimages/download.png' alt='{$lessonData['worksheet']}'></a>
            ";
        ?>
    </div>
</body>
</html>