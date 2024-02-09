<?php
    require("parentconnection.php");

    include('parentInfo.php');
        $userData = $result->fetch_assoc();
        $first_name = $_SESSION["first_name"];
        $email = $_SESSION["email"];
        $pass = $_SESSION["pass"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../parentstyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="container">
    <div class="container fluid mb-3 p-4 mt-2 shadow rounded bg-light">
    <h2>Welcome to the lesson changer for your child</h2>

    <div class="container text-center">
        <div class="row justify-content-md-center">
            <div class="container fluid mb-3 p-4 mt-2 shadow rounded">
            <?php
            

                $sql = $conn->query("SELECT * FROM childs WHERE parent_email='$email' LIMIT 1");
                $result = $sql->fetch_assoc();
                if (!$result ) {
                    $_SESSION["no_data"] = "There is no child associated with your email";
                }
                else {
                    $child_class = $result['class_name'];
                    $check_class_lesson = $conn->query("SELECT * FROM class WHERE class_name='$child_class'");
                    $check_result = $check_class_lesson->fetch_assoc();
                    if(!$check_result)
                    {
                        $_SESSION["no_data"] = "There is no class associated with your child's class";
                    }
                    else
                    {
                        $class_lesson = $check_result['lesson_name'];
    
                        $record = $conn->query("SELECT * FROM parent_lesson WHERE email='$email'");
                        $array = $record->fetch_assoc();
                        if(!$array)
                        {
                            $_SESSION["no_data"] = "There is no lesson associated with your email";
                        }
                        else
                        {
                            $id = $array['id'];
                            $lesson_name = $array["lesson_name"];
                            $update = "parentCrud/parentupdate.php?update=" . $id;
                            $delete = "parentCrud/parentconnection.php?delete=" . $id;
                        }
                    }
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
                <h2>Class' current lesson</h2>
                <p id='parentColor' class='fs-4 fw-light cd'>{$class_lesson}</p>
                <hr />
                <h2>Your child's current lesson chosen by you</h2>
                <p id='parentColor' class='fs-4 fw-light cd'>{$array['lesson_name']}</p>
                <p>
                    <a href='{$update}' class='btn btn-warning'>Update</a>
                </p>
            ";
            }
            ?>
            </div>

        </div>
    </div>
    </div>

</body>
</html>