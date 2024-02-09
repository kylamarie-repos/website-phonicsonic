<?php
    include("connection.php");
    session_start();
    include("header.php");
?>

<!doctype html>
<html lang="en">
<head>
        <title>Log in</title>
    </head>
    <body class="container">
        <div class="container fluid mb-3 p-4 mt-2 shadow rounded text-center">
            <h1 class="mt-3 mb-3">Which account are you logging in for?</h1>
            <a class="m-2" href="educatorIndex.php"><button type="button" class="btn btn-primary">Educator</button></a>
            <a class="m-2" href="parentIndex.php"><button type="button" class="btn btn-primary">Parent</button></a>
            <a class="m-2" href="childIndex.php"><button type="button" class="btn btn-primary">Child</button></a>
        </div>
        <script src="../script.js">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </body>
</html>