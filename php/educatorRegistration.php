<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
        <title>Educator Registration</title>
    </head>
<body class="container">
<?php
    require('connection.php');
    include("header.php");
    // When form submitted, insert values into the database.
    if(isset($_REQUEST["edu_reg_submit"]))
    {
        $email = $_POST["email"]; 
        $pass = $_POST["pass"];
        $class_name = ucfirst($_POST["class_name"]);
        $centre = ucfirst($_POST["centre"]);
    
        $user_check_query = "SELECT * FROM educators WHERE email='$email' LIMIT 1";
        $userResult = mysqli_query($conn, $user_check_query);
        $userData = mysqli_fetch_assoc($userResult);

        $class_check_query = "SELECT * FROM educators WHERE email='$email' LIMIT 1";
        $classResult = mysqli_query($conn, $class_check_query);
        $classData = mysqli_fetch_assoc($classResult);

        if($userData) {
            if($userData['email'] === $email) {
                $_SESSION["register_error"] = "Email already associated with an account";
            }
        }
        if($classData) {
            if($classData['class_name'] === $class_name) {
                $_SESSION["register_error"] = "Class already associated with an account";
            }
        }
        if(isset($_SESSION["register_error"]))
        {
            echo "
            <div class='container fluid mb-3 mt-3 p-4 mt-2 shadow rounded'>
            <p>" . $_SESSION["register_error"] . "</p>
            <a href='educatorRegistration.php'><button type='button' class='btn btn-info'>Educator Register</button></a></div>";
            unset($_SESSION["register_error"]);
        }
        else
        {
            $query = "INSERT INTO educators (email, pass, class_name, centre) VALUES ('$email', '$pass', '$class_name', '$centre');";
            $result = mysqli_query($conn, $query);

            $classquery = "INSERT INTO class (class_name) VALUES ('$class_name');";
            $classresult = mysqli_query($conn, $classquery);
            echo "
            <div class='container fluid mb-3 mt-3 p-4 mt-2 shadow rounded'>
            <h4>Educator registered successfully!</h4>
            <br>
            <h4>Please Login</h4>
            <a href='educatorIndex.php'><button type='button' class='btn btn-info'>Educator Login</button></a></div>";
        }

        
        
        }
    else {
?>
<button class="btn" onclick="history.back()" id="back-btn"><img src="../images/double-left.png" alt="back-btn" onmouseover="backOnHover(this)" onmouseout="backOffHover(this)" /></button>
    <div class="container fluid mb-3 p-4 mt-2 shadow rounded">
        <form class="form" action="" method="post">
            <h1 class="login-title">Educator Registration</h1>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Email Address:</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Email" required/>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Password:</label>
                <input type="text" class="form-control" name="pass" id="pass" placeholder="Password" required/>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Class:</label>
                <input type="text" class="form-control" name="class_name" id="class_name" placeholder="Class Name" required/>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Centre:</label>
                <input type="text" class="form-control" name="centre" id="centre" placeholder="Centre Name" required/>
            </div>
            <br>
            <input type="submit" id="btn" value="Register" name="edu_reg_submit" class="btn btn-primary"/>
            
            <p class="link">Have a login already? <a href="login.php">Login</a></p>
        </form>
    </div>
<?php
    }
?>

<script src="../script.js">
</body>
</html>