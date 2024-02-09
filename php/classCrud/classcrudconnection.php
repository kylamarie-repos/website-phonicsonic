<?php
    $servername = "localhost";
    $username = "30032342";
    $password = "test";
    $db_name = "people";
    $conn = new mysqli($servername, $username, $password, $db_name, 3306);
    if($conn->connect_error)
    {
        die("Connection failed".$conn->connect_error);
    }

    $result = $conn->query("select * from class");

    if(isset($_POST["update"]))
    {
        include("classheader.php");
        $id = $conn -> real_escape_string($_POST["id"]);
        $class_name = $conn -> real_escape_string($_POST["class_name"]);
        $lesson_name = $conn -> real_escape_string($_POST["lesson_name"]);

        $update = "UPDATE class SET class_name='$class_name', lesson_name='$lesson_name'";

        if($conn->query($update) === TRUE)
        {
            echo "
            <div class='container fluid mb-3 p-4 mt-2 shadow rounded text-center bg-light'>
        <h1>Record updated successfully</h1>
        <br>
        <p><a href='classcrudindex.php'><button class='btn btn-success'>Return to index page</button></a></p>
        </div>
            ";
        }
        else
        {
            echo "
            <div class='container fluid mb-3 p-4 mt-2 shadow rounded text-center bg-light'>
                <h1>Error updating data</h1>
                <p>{$conn->error}</p>
                <p><a href='classupdate.php'><button class='btn btn-danger>Return to update form</button></a></p>
                </div>
            ";
        }
    } // end update post



    if(isset($_GET["delete"]))
    {
        include("classheader.php");
        $id = $_GET["delete"];

        $del = "delete from class where id='$id'";

        if($conn->query($del) === TRUE)
        {
            echo "
            <div class='container fluid mb-3 p-4 mt-2 shadow rounded text-center bg-light'>
                <h1>Record Deleted</h1>
                <p><a href='classcrudindex.php'><button class='btn btn-success'>Back to index page</button></a></p>
                </div>
            ";
        }
        else
        {
            echo "
            <div class='container fluid mb-3 p-4 mt-2 shadow rounded text-center bg-light'>
                <h1>Error deleting record</h1>
                <p>{$conn->error}</p>
                <p><a href='classcrudindex.php'><button class='btn btn-danger'>Back to index page</button</a></p>
                </div>
            ";
        }
        }
?>