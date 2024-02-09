<?php
    require('connection.php');
    include("childheader.php");

    session_start();
    include('childInfo.php');
        $userData = $result->fetch_assoc();
        $parent_email = $_SESSION["parent_email"];
        $user = $_SESSION["user"];
        $pass = $_SESSION["pass"];
        $class_name = $_SESSION["class_name"];        
?>
<!doctype html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" type="text/css" href="childstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <title>Child Profile</title>
    </head>
  <body class="container">

    <div class="container fluid mb-3 p-4 mt-2 shadow rounded bg-light">
    <h1>Hello, <?php echo $user; ?> of <?php echo $class_name; ?>!</h1>
    <p>Parent email: <?php echo $parent_email; ?></p>
    <p>Password: <?php echo $pass; ?></p>
    </div>

    <div class="container fluid mb-3 p-4 mt-2 shadow rounded bg-light card">
      <div class="row">
        <div class="col">
          <button id="childBtn1" class="btn">
            <a class="link-body-emphasis link-offset-3 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" aria-current="page" href="audio.php">
            <img id="childImage" class="card-img-top" src="../images/hear.png" alt="hear">
            <p class="card-title">Sound Chart</p>
            </a>
          </button>
        </div>
        <div class="col">
          <button id="childBtn2" class="btn">
            <a class="link-body-emphasis link-offset-3 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" aria-current="page" href="pics_audio.php">
            <img id="childImage" class="card-img-top" src="../images/see.png" alt="see">
            <p class="card-title">Sound Chart with Images</p>
            </a>
          </button>
        </div>
        <div class="col">
          <button id="childBtn3" class="btn">
            <a class="link-body-emphasis link-offset-3 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" aria-current="page" href="../matching_game/game.php">
            <img id="childImage" class="card-img-top" src="../images/guess.png" alt="guess">
            <p class="card-title">Sound Game</p>
            </a>
          </button>
        </div>
        <div class="col">
          <button id="childBtn4" class="btn">
            <a class="link-body-emphasis link-offset-3 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" aria-current="page" href="classlesson.php">
            <img id="childImage" class="card-img-top" src="../images/child-desk.png" alt="class">
            <p class="card-title">Class Lesson</p>
            </a>
          </button>
        </div>
        <div class="col">
          <button id="childBtn5" class="btn">
            <a class="link-body-emphasis link-offset-3 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" aria-current="page" href="parentlesson.php">
            <img id="childImage" class="card-img-top" src="../images/parent.png" alt="parent">
            <p class="card-title">Parent Lesson</p>
            </a>
          </button>
        </div>
      </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>