<?php
    session_start();
    require("crudconnection.php");
    include("crudheader.php");
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD create</title>
</head>
<body class="container">
    
    
<div class="container fluid mb-3 p-4 mt-2 shadow rounded bg-white">
    <button class="btn d-flex float-start" onclick="history.back()" id="back-btn"><img src="crudimages/double-left.png" alt="back-btn" onmouseover="backOnHover(this)" onmouseout="backOffHover(this)" /></button>
<br />
<br />
    <h2>Use form below to create a record in our class lesson database</h2>
    <form method="post" action="crudconnection.php" class="form-group">
    <label>Lesson Letter</label>
        <br>
        <input type="text" name="letter" placeholder="Letter" class="form-control">
        <br><br>
        <label>Enter Lesson name</label>
        <br>
        <input type="text" name="lesson_name" placeholder="Lesson Name" class="form-control">
        <br><br>
        <label>Enter embedded Video URL</label>
        <br>
        <input type="text" name="video" placeholder="embedded video url" class="form-control">
        <br><br>
        <label>Enter Worksheet Address</label>
        <br>
        <input type="text" name="worksheet" placeholder="worksheet.pdf or similar" class="form-control">
        <br><br>
        <input type="submit" name="submit" value="Submit record" class="btn btn-dark">
    </form>
    </div>
</body>
</html>