<?php
    include('connection.php');
    include("parentheader.php");

    session_start();
    include('parentInfo.php');
        $userData = $result->fetch_assoc();
        $first_name = $_SESSION["first_name"];
        $email = $_SESSION["email"];
        $pass = $_SESSION["pass"];
  
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../style.css" />
    
    <link rel="stylesheet" type="text/css" href="parentstyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body class="container">
    <div class="container fluid mb-2 p-4 mt-2 shadow rounded bg-light">
      <div class="row">
        <div class="col">
          <h1>Hello, <?php echo $first_name; ?>!</h1>
        </div>
        <div class="col">
          <p>Email: <?php echo $email; ?></p>
          <p>Password: <?php echo $pass; ?></p>
        </div>
      </div>
    </div>

    <div>
      <?php
        include("parentCrud/parentcrudindex.php");
      ?>
    </div>

    <script src="../script.js">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>