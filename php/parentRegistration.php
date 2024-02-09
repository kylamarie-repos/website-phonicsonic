<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
        <title>Parent Registration</title>
    </head>
<body class="container">
<?php
    require('connection.php');
    include("header.php");
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['submit'])) {
        
        $first_name = ucfirst($_POST['first_name']);
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        
        $user_check_query = "SELECT * FROM parents WHERE email='$email' LIMIT 1";
        $userResult = mysqli_query($conn, $user_check_query);
        $userData = mysqli_fetch_assoc($userResult);

        $parent_check_query = "SELECT * FROM parent_lesson WHERE email='$email' LIMIT 1";
        $parentResult = mysqli_query($conn, $parent_check_query);
        $parentData = mysqli_fetch_assoc($parentResult);


        if($userData) {
            if($userData['email'] === $email) {
                $_SESSION["register_error"] = "Email already associated with an account";
            }
        }
        if($parentData) {
            if($parentData['email'] === $email) {
                $_SESSION["register_error"] = "Email already associated with a lesson";
            }
        }
        if(isset($_SESSION["register_error"]))
        {
            echo "
            <div class='container fluid mb-3 mt-3 p-4 mt-2 shadow rounded'>
            <p>" . $_SESSION["register_error"] . "</p><a href='ParentRegistration.php'><button type='button' class='btn btn-info'>Parent Register</button></a></div>";
            unset($_SESSION["register_error"]);
        }
        else
        {
            $query = "INSERT INTO parents (first_name, email, pass) VALUES ('$first_name', '$email', '$pass');";
            $result = mysqli_query($conn, $query);

            $parentquery = "INSERT INTO parent_lesson (email) VALUES ('$email');";
            $parentresult = mysqli_query($conn, $parentquery);
            echo "
            <div class='container fluid mb-3 mt-3 p-4 mt-2 shadow rounded'>
            <h4>Parent registered successfully!</h4>
            <br>
            <h4>Please Login</h4>
            <a href='parentIndex.php'><button type='button' class='btn btn-info'>Parent Login</button></a></div>";
        }

    } else {
?>


<button class="btn" onclick="history.back()" id="back-btn"><img src="../images/double-left.png" alt="back-btn" onmouseover="backOnHover(this)" onmouseout="backOffHover(this)" /></button>
        <div class="container fluid mb-3 p-4 mt-2 shadow rounded">
        <form class="form" action="" method="post">
            <h1 class="login-title">Parent Registration</h1>
            <div class="mb-3">
                <label type="text" class="form-label">First name:</label>
                    <input type="text" class="form-control" name="first_name" placeholder="First name" aria-label="First name" required/>
                </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Email Address:</label>
                <input type="text" class="form-control" name="email" placeholder="Email" required/>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Password:</label>
                <input type="text" class="form-control" name="pass" placeholder="Password" required/>
            </div>
            <br>
            <input type="submit" id="btn" value="Register" name="submit" class="btn btn-primary"/>
            <p class="link">Have a login already? <a href="login.php">Login</a></p>
        </form>
    </div>
<?php
    }
?>

<script src="../script.js">
</body>
</html>