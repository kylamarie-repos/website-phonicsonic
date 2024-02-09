<?php
    session_start();
    require("crudconnection.php");
    include("crudheader.php");
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
    <button class="btn" onclick="history.back()" id="back-btn"><img src="crudimages/double-left.png" alt="back-btn" onmouseover="backOnHover(this)" onmouseout="backOffHover(this)" /></button>

    <h1>Update a record</h1>

    <?php
    $id = $_GET["update"];
    $record = $conn->query("select * from lessons where id=$id");
    $row = $record->fetch_assoc();
    ?>

    <form method="post" action="crudconnection.php" class="form-group">
        
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        
        <label>Letter</label>
        <br>
        <input type="text" name="letter" placeholder="Letter" class="form-control" value="<?php echo $row['letter'] ?>">
        <br><br>
        <label>Lesson Name</label>
        <br>
        <input type="text" name="lesson_name" placeholder="Lesson Name" class="form-control" value="<?php echo $row['lesson_name'] ?>">
        <br><br>
        <label>Video embed URL</label>
        <br>
        <input type="text" name="video" placeholder="Video embed URL" class="form-control" value="<?php echo $row['video'] ?>">
        <br><br>
        <label>Worksheet address</label>
        <br>
        <input type="text" name="worksheet" placeholder="worksheet.pdf or similar" class="form-control" value="<?php echo $row['worksheet'] ?>">
        <br><br>
        <input type="submit" name="update" value="Submit record" class="btn btn-dark">
    </form>
</div>
</body>
</html>