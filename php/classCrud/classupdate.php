<?php
    session_start();
    require("classcrudconnection.php");
    include("classheader.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update a record</title>
</head>
<body class="container">
<div class="container fluid mb-3 p-4 mt-2 shadow rounded bg-white">
    <button class="btn" onclick="history.back()" id="back-btn"><img src="../../images/double-left.png" alt="back-btn" onmouseover="backOnHover(this)" onmouseout="backOffHover(this)" /></button>

    <h1>Update a record</h1>

    <?php
    $id = $_GET["update"];
    $record = $conn->query("select * from class where id=$id");
    $row = $record->fetch_assoc();

    $sql = "SELECT * FROM lessons";
    $lesson_result = $conn->query($sql);
    ?>

    <form method="post" action="classcrudconnection.php" class="form-group">
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        <input type="hidden" name="class_name" value="<?php echo $row['class_name'] ?>">
        <h3>Current lesson: <?php echo $row['lesson_name'] ?></h3>
        <br><br>


        <div class="form-check">

        <?php

            if($lesson_result->num_rows > 0)
            {
                while($row = $lesson_result->fetch_assoc())
                {
                    $lesson = $row["lesson_name"];

                    echo"<input class='form-check-input fs-4' type='radio' name='lesson_name' id='flexRadioDefault1' value='$lesson'>
                    <label class='form-check-label fs-4' for='flexRadioDefault1'>
                    $lesson
                    </label>
                    </input>
                    <br>";
                }
            }
            else
            {
                echo "No lessons were found in the database";
            }
        ?>

        </div>
        
        
            <br><br>
            <input type="submit" name="update" value="Submit record" class="btn btn-primary"> 
    </form>

</div>
</body>
</html>