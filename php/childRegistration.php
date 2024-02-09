<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
        <title>Child Registration</title>
    </head>
<body class="container">
<?php
    require('connection.php');
    include("header.php");
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['submit'])) {
        
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $class_name = $_POST['class_name'];
        $parent_email = $_POST['parent_email'];
        
        $user_check_query = "SELECT * FROM childs WHERE user='$user' LIMIT 1";
        $userResult = mysqli_query($conn, $user_check_query);
        $userData = mysqli_fetch_assoc($userResult);

        $parent_check_query = "SELECT * FROM parents WHERE email='$parent_email' LIMIT 1";
        $parentResult = mysqli_query($conn, $parent_check_query);
        $parentData = mysqli_fetch_assoc($parentResult);

        $class_check_query = "SELECT * FROM class WHERE class_name='$class_name'LIMIT 1";
        $classResult = mysqli_query($conn, $class_check_query);
        $classData = mysqli_fetch_assoc($classResult);

        if($userData) {
            if($userData['user'] === $user)
            {
                $_SESSION["register_error"] = "Username already exists";
            }
            if($userData['parent_email'] === $parent_email){
                $_SESSION["register_error"] = "Email already associated to a child account";
            }
        }
        if(!$parentData)
        {
            $_SESSION["register_error"] = "There is no parent registered with that email";
        }
        if(isset($userData["parent_email"]) && $userData["parent_email"] === $parent_email)
        {
            $_SESSION["register_error"] = "There is already a child registered with that email";
        }
        if(!$classData)
        {
            $_SESSION["register_error"] = "There is no class registered with that name";
        }
        if(isset($_SESSION["register_error"]))
        {
            echo "
            <div class='container fluid mb-3 mt-3 p-4 mt-2 shadow rounded text-center'>
            <h4 class='m-3'>" . $_SESSION["register_error"] . "</h4>
            <a href='childRegistration.php'><button type='button' class='btn btn-info'>Child Register</button></a></div>";
            unset($_SESSION["register_error"]);
        }
        else
        {
            $parent_id = $parentData["parent_id"];
            if($parent_id === "0")
            {
                $_SESSION["register_error"] = "Error registering";
            }

            $query = "INSERT INTO childs (user, parent_email, pass, class_name) VALUES ('$user', '$parent_email', '$pass', '$class_name')";
            $result = mysqli_query($conn, $query);
            echo "
            <div class='container fluid mb-3 mt-3 p-4 mt-2 shadow rounded'>
            <h4>Child registered successfully!</h4>
            <br>
            <h4>Please Login</h4>
            <a href='childIndex.php'><button type='button' class='btn btn-info'>Child Login</button></a></div>";
        }
    }
    else {
?>

    <div class="container mt-3">
        
    <button class="btn" onclick="history.back()" id="back-btn"><img src="../images/double-left.png" alt="back-btn" onmouseover="backOnHover(this)" onmouseout="backOffHover(this)" /></button>
    <div class='container fluid mb-3 mt-3 p-4 mt-2 shadow rounded'>    
    <form class="form" action="" method="post">
            <h1 class="login-title">Child Registration</h1>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Username:</label>
                <input type="text" class="form-control" name="user" placeholder="Username" required/>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Parent's Email Address:</label>
                <input type="text" class="form-control" name="parent_email" placeholder="Parent's Email" required/>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Password:</label>
                <input type="text" class="form-control" name="pass" placeholder="Password" required/>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Class Name:</label>
                <input type="text" class="form-control" name="class_name" placeholder="Class Name" required/>
            </div>
            <br>
            <input type="submit" id="btn" value="Register" name="submit" class="btn btn-primary"/>
            <p class="link">Have a login already? <a href="login.php">Login</a></p>
        </form>
    </div>
    </div>
<?php
    }
?>

<script src="../script.js">
</body>
</html>