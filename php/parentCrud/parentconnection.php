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

    $result = $conn->query("select * from parent_lesson");

    if(isset($_POST["update"]))
    {
        include("parentheader.php");
        $id = $conn -> real_escape_string($_POST["id"]);
        $email = $conn -> real_escape_string($_POST["email"]);
        $lesson_name = $conn -> real_escape_string($_POST["lesson_name"]);

        $update = "UPDATE parent_lesson SET email='$email', lesson_name='$lesson_name'";

        if($conn->query($update) === TRUE)
        {
            echo "
            <div class='container fluid mb-3 p-4 mt-2 shadow rounded text-center bg-light'>
        <h1>Record updated successfully</h1>
        <br>
        <p><a href='../parentprofile.php'><button class='btn btn-success'>Return to index page</button></a></p>
        </div>
            ";
        }
        else
        {
            echo "
            
            <div class='container fluid mb-3 p-4 mt-2 shadow rounded text-center bg-light'>
                <h1>Error updating data</h1>
                <p>{$conn->error}</p>
                <p><a href='parentupdate.php'><button class='btn btn-danger>Return to update form</button></a></p>
                </div>
            
            ";
        }
    } // end update post

    if(isset($_GET["delete"]))
    {
        include("parentheader.php");
        $id = $_GET["delete"];

        $del = "delete from class where id='$id'";

        if($conn->query($del) === TRUE)
        {
            echo "
            
            <div class='container fluid mb-3 p-4 mt-2 shadow rounded text-center bg-light'>
            <h1>Record Deleted</h1>
            <p><a href='parentProfile.php'><button class='btn btn-success'>Back to index page</button></a></p>
            </div>
            ";
        }
        else
        {
            echo "
            <div class='container fluid mb-3 p-4 mt-2 shadow rounded text-center bg-light'>
                <h1>Error deleting record</h1>
                <p>{$conn->error}</p>
                <p><a href='parentProfile.php'><button class='btn btn-danger'>Back to index page</button</a></p>
                </div>
            ";
        }
        }
?>