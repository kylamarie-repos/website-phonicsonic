<?php
    session_start();
    require("classcrudconnection.php");
    include("classheader.php");
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD create</title>
</head>
<body class="container">
    
<?php
    if(isset($_GET["submit"]))
    {
        $class_name = $_POST["class_name"];
        $lesson_name = $_POST["lesson_name"];

        $lesson_check_query = "SELECT * FROM lessons WHERE lesson_name='$lesson_name' LIMIT 1";
        $lessonResult = mysqli_query($conn, $lesson_check_query);
        $lessonData = mysqli_fetch_assoc($lessonResult);

        if(!$lessonData)
        {
            $_SESSION["lesson_register_error"] = "There are no lessons with that name";
        }
        if(isset($_SESSION["lesson_register_error"]))
        {
            echo "
            <div class='container fluid mb-3 mt-3 p-4 mt-2 shadow rounded'>
            <p>" . $_SESSION["lesson_register_error"] . "</p><a href='classform.php'><button type='button' class='btn btn-info'>Class Form</button></a></div>";
            unset($_SESSION["lesson_register_error"]);
            
        }

    }
?>

    <button class="btn d-flex float-start" onclick="history.back()" id="back-btn"><img src="../../images/double-left.png" alt="back-btn" onmouseover="backOnHover(this)" onmouseout="backOffHover(this)" /></button>
        <br />
        <br />
    <div class="card card-body m-3">
    <h2>Use form below to create a class in our class database</h2>
    <form method="post" action="crudconnection.php" class="form-group">
    <label>Class Name</label>
        <br>
        <input type="text" name="class_name" placeholder="Class Name" class="form-control">
        <br><br>
        <label>Enter Lesson name</label>
        <br>
        <input type="text" name="lesson_name" placeholder="Lesson Name" class="form-control">
        <br>
        <input type="submit" name="submit" value="Submit record" class="btn btn-primary">
    </form>
    </div>
</body>
</html>