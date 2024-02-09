<?php 
    require("connection.php");
    session_start();
    // require("letterinfo.php");
    include("childheader.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <title>Phonics Audio</title>
        <link rel="stylesheet" type="text/css" href="../style.css">
    </head>
<body class="container">

    <div class="container fluid mb-3 p-4 mt-2 shadow rounded bg-light">
    <button class="btn" onclick="history.back()" id="back-btn"><img src="../images/double-left.png" alt="back-btn" onmouseover="backOnHover(this)" onmouseout="backOffHover(this)" /></button>
        <div class="container text-center">
            <div class="mt-3 mb-3">
                <h2>Repeat after me!</h2>
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
                    $sql = "SELECT letter, audio_file FROM $groupClass";
                    $result = $conn->query($sql);

                    echo '<div id="' . $groupClass . 'Letters" class="align-items-start row flex-wrap letter-row">';

                    if($result->num_rows > 0)
                    {
                        while ($row = $result->fetch_assoc())
                        {
                            $letter = $row["letter"];
                            $audioFile = $row["audio_file"];

                            echo '<div class="col"><button id="letterBtn" class="btn btn-lg p-5" onclick="playAudio(\'' . $audioFile . '\')">' . $letter . '</button></div>';
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

    <!-- Reference the JavaScript file with the correct relative path -->
    <script src="../audioscript.js"></script>
</body>
</html>
