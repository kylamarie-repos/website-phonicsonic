<?php
session_start();
require("connection.php");
include("childheader.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sounds Chart with Pictures</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body class="container">

<div class="container fluid mb-3 p-4 mt-2 shadow rounded bg-light">
<button class="btn" onclick="history.back()" id="back-btn"><img src="../images/double-left.png" alt="back-btn" onmouseover="backOnHover(this)" onmouseout="backOffHover(this)" /></button>
        <div class="container text-center">
            <div class="mt-3 mb-3">
                <h2>Repeat after me!</h2>
                <h4>with images!</h4>
            </div>

            <!-- Group Buttons -->
            <div class="container fluid mb-3 p-4 row align-items-start">
                <?php
                    $groups = [
                        "Group 1" => "group1",
                        "Group 2" => "group2",
                        "Group 3" => "group3",
                        "Group 4" => "group4",
                        "Group 5" => "group5",
                        "Group 6" => "group6",
                        "Group 7" => "group7"
                    ];

                    foreach ($groups as $groupName => $groupClass)
                    {
                        echo '<div class="col">
                            <button button class="btn btn-primary" onclick="showGroup(\'' . $groupClass . '\')">' . $groupName . '</button>
                            </div>';
                    }
                ?>
            </div>

            <?php
                foreach ($groups as $groupClass)
                {
                    $sql = "SELECT letter, audio_file, image_url FROM $groupClass";
                    $result = $conn->query($sql);
                    // Define the directory path for images
                    $imageDirectory = "../images/sounds_chart/" . $groupClass . "/";

                    echo '<div id="' . $groupClass . 'Letters" class="align-items-start row flex-wrap letter-row">';

                    if($result->num_rows > 0)
                    {
                        while ($row = $result->fetch_assoc())
                        {
                            $letter = $row["letter"];
                            $audioFile = $row["audio_file"];
                            $imageUrl = $row["image_url"];
                            $imageFile = $imageDirectory . $imageUrl . ".png";

                            echo '
                            <div class="card m-3 px-4 mx-auto container" style="max-width: 32vw; min-height: 20vh;">
                            <div class="row g-0 gx-5">
                                <div class="col-3 p-3 mb-2 clearfix">
                                <img id="chart_img" src="' . $imageFile . '" alt="' . $letter . '" class="align-items-center mx-auto card-img-top col-md-6 float-md-start mt-5 ms-md-3" alt="' . $imageUrl . '">
                                </div>
                                <div class="col-sm-9 p-3">
                                <div class="card-body">
                                <button id="letterBtn" class="mb-5 mt-5 mx-auto btn btn-lg p-5 float-md-end" onclick="playAudio(\'' . $audioFile . '\')">' . $imageUrl . '</button>
                                </div>
                                </div>
                            </div>
                            </div>
                            ';
                            }
                    }
                    else
                    {
                        echo "No letters found in the database.";
                    }
                    echo '</div>';
                }
            ?>
        </div>
    </div>

    <footer class="container fluid mb-5 p-4 mt-2 shadow rounded mx-auto p-2 bg-gradient navbar-expand-lg fs-5 fixed-bottom">
                <div>
                    <audio id="audioPlayer" controls>
                        <source id="audioSource" src="" type="audio/mpeg">
                    </audio>
                </div>
            </footer>


    <script src="../lessonscript.js"></script>
</body>
</html>
