<?php
    session_start();
    require("classcrudconnection.php");
    include("classheader.php");

    include("../educatorinfo.php");
    $userData = $result->fetch_assoc();
    $class_name = $_SESSION["class_name"];
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD index</title>
</head>
<body class="container">
    <div class="card card-body shadow">
        <h2>Welcome to the class editor</h2>
        <button class="btn d-flex float-start" onclick="history.back()" id="back-btn"><img src="../../images/double-left.png" alt="back-btn" onmouseover="backOnHover(this)" onmouseout="backOffHover(this)" /></button>
        <div>
            <?php
                $class_check_query = $conn->query("SELECT * FROM class WHERE class_name='$class_name'");
                $array = $class_check_query->fetch_assoc();

                if(!$array)
                {
                    $_SESSION["no_data"] = "There is no class associated with your email in the class database";
                }
                else
                        {
                            $id = $array['id'];
                            $lesson_name = $array["lesson_name"];
                            $update = "classupdate.php?update=" . $id;
                            $delete = "classconnection.php?delete=" . $id;
                        }
                if(isset($_SESSION["no_data"]))
                {
                    echo "
                        <h4 class='m-3'>" . $_SESSION["no_data"] . "</h4>
                        ";
                        unset($_SESSION["no_data"]);
                }
                else
                {
                    echo "
                    <div class='text-center'>
                        <h2>{$class_name}'s current lesson:</h2>
                        <p class='fs-4 fw-light'>{$lesson_name}</p>
                        <p>
                            <a href='{$update}' class='btn btn-warning'>Update</a>
                        </p>
                        </div>
                    ";
                }
            ?>
        </div>


    </div>
</body>
</html>