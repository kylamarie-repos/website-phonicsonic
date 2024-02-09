<?php
    session_start();
    require("parentconnection.php");
    include("../classCrud/classheader.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="container">
    <?php
        if(isset($_GET["submit"]))
        {
            $lesson_name = $_POST["lesson_name"];
            $email = $_POST["email"];

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
                    <div class='container fluid mb-3 mt-3 p-4 shadow rounded'>
                    <p>" . $_SESSION["lesson_register_error"] . "</p><a href='parentform.php'><button type='button' class='btn btn-info'>Parent Lesson Form</button></a></div>";
                unset($_SESSION["lesson_register_error"]);
            }
        }
    ?>

        <button class="btn d-flex float-start" onclick="history.back()" id="back-btn"><img src="../../images/double-left.png" alt="back-btn" onmouseover="backOnHover(this)" onmouseout="backOffHover(this)" /></button>
        <br />
        <br />
        <div class="card card-body m-3">
            <h2>Use the form below to create a new parent lesson in our parent lesson database</h2>
            <form method="post" action="parentconnection.php" class="form-group">
                <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
                <input type="hidden" name="email" value="<?php echo $row["email"] ?>">
                <br>

                <?php
                    if($lessonData->num_rows > 0)
                    {
                        while($row = $lessonData->fetch_assoc())
                        {
                            $lesson = $row["lesson_name"];

                            echo"<input type='radio' name='lesson_name' value='$lesson'>$lesson</input>
                            <br>";
                        }
                    }
                    else
                    {
                        echo "No lessons were found in the database";
                    }
                ?>
                <br>
                <input type="submit" name="submit" value="Submit record" class="btn btn-primary">

            </form>
        </div>

</body>
</html>