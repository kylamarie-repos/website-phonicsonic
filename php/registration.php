<?php
    require('connection.php');
    include("header.php");
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['submit'])) {
        
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $user = $_POST['user'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        
        $query = "
            INSERT INTO `users` (`id`, `first_name`, `last_name`, `user`, `email`, `pass`) VALUES (`NULL`, `$first_name`, `$last_name`, `$user`, `$email`, `$pass`);";

        $result = mysqli_query($conn, $query);
        if ($result) {
            // echo 'alert("Registration successful")';
            // header("Location: index.php");
            echo "    <form name='form' method='POST' action='login.php' onsubmit='return isvalid()'>
            <div class='mb-3'>
                <label class='form-label'>Username/email: </label>
                <input type='text' id='user' name='user' class='form-control'><br>
            </div>
            <div class='mb-3'>
                <label class='form-label'>Password: </label>
                <input type='password' id='pass' name ='pass' class='form-control'><br>
                <input type='submit' id='btn' value='Login' name='submit' class='btn btn-primary'/>
            </div>
        </form>
    ";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
   
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Register</title>
    </head>
  <body class="container">
    


  <div class="container fluid mb-3 p-4 mt-2 shadow rounded text-center">
    <h1 class="mt-3 mb-3">Who are you creating an account for?</h1>
                <a class="m-2" href="educatorRegistration.php"><button type="button" class="btn btn-primary">Educator</button></a>
                <a class="m-2" href="parentRegistration.php"><button type="button" class="btn btn-primary">Parent</button></a>
                <a class="m-2" href="childRegistration.php"><button type="button" class="btn btn-primary">Child</button></a>
            </div>
            <script src="../script.js">

    </body>


<?php

    }
?>
