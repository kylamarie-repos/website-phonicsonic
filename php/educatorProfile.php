<?php
    include('connection.php');
    include("educatorheader.php");

    session_start();
    include('educatorInfo.php');
        $userData = $result->fetch_assoc();
        $email = $_SESSION["email"];
        $pass = $_SESSION["pass"];
        $class_name = $_SESSION["class_name"];
  
?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="educatorstyle.css">
        <title>Educator Profile</title>
    </head>
  <body class="container">

    <div class="container fluid mb-3 p-4 mt-2 shadow rounded bg-light">
    <h1>Hello, teacher of <?php echo $class_name; ?>!</h1>
    <p>Email: <?php echo $email; ?></p>
    <p>Password: <?php echo $pass; ?></p>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>