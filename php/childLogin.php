<?php
    session_start();
    include('connection.php');
    include("header.php");
    
    if (isset($_POST['child_login_submit'])) 
    {
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $sql = "select id from childs where user = '$user' and pass = '$pass'";  
        $result = mysqli_query($conn, $sql);  

        if($result->num_rows==1)
        {
            $userData = $result->fetch_assoc();
            $_SESSION["user_id"] = $userData["id"];
            $_SESSION["class_name"] = $classData["class_name"];
            
            header("Location: childProfile.php");
            exit();
        } else
        {
            $_SESSION["login_error"] = "Invalid email or pass.";
        }
        if (isset($_SESSION["login_error"])) {
            echo "<div class='container fluid mb-3 p-4 mt-2 shadow rounded text-center'>
            <button class='btn d-flex float-start' onclick='history.back()' id='back-btn'><img src='../images/double-left.png' alt='back-btn' onmouseover='backOnHover(this)' onmouseout='backOffHover(this)' /></button>
            <br><br><br>
            <h3>" . $_SESSION["login_error"] . "</h3>
            <a href='childIndex.php'<button class='btn btn-primary'>Child Login</button></a>
            </div>
            ";
            unset($_SESSION["login_error"]);
        }
    }
    ?>