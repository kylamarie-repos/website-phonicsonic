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

    $result = $conn->query("select * from lessons");

    if(isset($_POST["submit"]))
    {
        include("crudheader.php");
        // create variables from the form post data
        // using object oriented style
        $letter = $conn -> real_escape_string($_POST["letter"]);
        $lesson_name = $conn -> real_escape_string($_POST["lesson_name"]);
        $video = $conn -> real_escape_string($_POST["video"]);
        $worksheet = $conn -> real_escape_string($_POST["worksheet"]);

        // create a sql insert command
        $insert = "insert into lessons(letter, lesson_name, video, worksheet) values('$letter','$lesson_name','$video','$worksheet')";

        if($conn->query($insert) === TRUE)
        {
            echo "
                    <div class='container fluid mb-3 p-4 mt-2 shadow rounded text-center bg-light'>
                        <h1>Record added successfully</h1>
                        <br>
                        <p><a href='crudindex.php'><button class='btn btn-success'>Return to index page</button</a></p>
                    </div>
            ";
        }
        else
        {
            echo "
            <div class='container fluid mb-3 p-4 mt-2 shadow rounded text-center bg-light'>
                <h1>Error submitting data</h1>
                <p>{$conn->error}</p>
                <br>
                <p><a href='form.php'><button class='btn btn-danger'>Return to form</button></a></p>
                </div>
            
            ";
        }
    } //end isset post

    // check if form data has been sent via post
    if(isset($_POST["update"]))
    {
        include("crudheader.php");
        // create variables from our form post data
        $id = $conn -> real_escape_string($_POST["id"]);
        $letter = $conn -> real_escape_string($_POST["letter"]);
        $lesson_name = $conn -> real_escape_string($_POST["lesson_name"]);
        $video = $conn -> real_escape_string($_POST["video"]);
        $worksheet = $conn -> real_escape_string($_POST["worksheet"]);

        // create a sql update command
        $update = "update lessons set letter='$letter', lesson_name='$lesson_name', video='$video', worksheet='$worksheet' where id='$id'";

        if($conn->query($update) === TRUE)
        {
            echo "
            <div class='container fluid mb-3 p-4 mt-2 shadow rounded text-center bg-light'>
                <h1>Record updated successfully</h1>
                <br>
                <p><a href='crudindex.php'><button class='btn btn-success'>Return to index page</button></a></p>
                </div>
            ";
        }
        else
        {
            echo "
            <div class='container fluid mb-3 p-4 mt-2 shadow rounded text-center bg-light'>
                <h1>Error updating data</h1>
                <p>{$conn->error}</p>
                <br>
                <p><a href='update.php'><button class='btn btn-danger'>Return to update form</button></a></p>
                </div>
            
            ";
        }
    } // end update post
    
    // delete record
    if(isset($_GET["delete"]))
    {
        include("crudheader.php");
        $id = $_GET["delete"];

        $del = "delete from lessons where id='$id'";

        if($conn->query($del) === TRUE)
        {
            echo "
            <div class='container fluid mb-3 p-4 mt-2 shadow rounded text-center bg-light'>
                <h1>Record Deleted</h1>
                <br>
                <p><a href='crudindex.php'><button class='btn btn-success'>Back to index page</button></a></p>
                </div>
            ";
        }
        else
        {
            echo "
            <div class='container fluid mb-3 p-4 mt-2 shadow rounded text-center bg-light'>
                <h1>Error deleting record</h1>
                <p>{$conn->error}</p>
                <br>
                <p><a href='crudindex.php'><button class='btn btn-warning'>Back to index page</button></a></p>
                </div>
            ";
        }
        }
    
?>