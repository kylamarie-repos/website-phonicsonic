<?php
require("connection.php");
include("header.php");
session_start();
?>

<!doctype html>
<html lang="en">
<head>
        <title>Educator Login</title>
    </head>
  <body class="container">
  <button class="btn" onclick="history.back()" id="back-btn"><img src="../images/double-left.png" alt="back-btn" onmouseover="backOnHover(this)" onmouseout="backOffHover(this)" /></button>
  <div class="container fluid mb-3 p-4 mt-2 shadow rounded">      
  <h1 class="login-title">Educator Login</h1>
  <form name="form" method="POST" action="educatorLogin.php" onsubmit="return isvalid()">
            <div class="mb-3">
                <label class="form-label">Email: </label>
                <input type="text" id="email" name="email" class="form-control"><br>
            </div>
            <div class="mb-3">
                <label class="form-label">Password: </label>
                <input type="password" id="pass" name ="pass" class="form-control"><br>
                <input type="submit" id="btn" value="Login" name="edu_login_submit" class="btn btn-primary"/>
            </div>
        </form>
  </div>
        <script src="../script.js">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>