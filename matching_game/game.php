<?php
session_start();
require("../php/connection.php");
include("../matching_game/gameHeader.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Phonics Game</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body class="container">
    <button class="btn" onclick="history.back()" id="back-btn"><img src="../images/double-left.png" alt="back-btn" onmouseover="backOnHover(this)" onmouseout="backOffHover(this)" /></button>
    <div class="container fluid mb-3 p-4 mt-2 shadow rounded bg-light text-center">
            <div class="mt-3 mb-3">
                <h1>Phonics Game</h1>
            </div>

            <!-- Game Area -->
            <div id="gameArea">
                <!-- The game content will be dynamically generated here -->
            </div>

            <div class="d-flex justify-content-center">
                <button id="playAudioButton" class="btn btn-primary">Play Audio</button>
            </div>


            <!-- Add a div for the "Play Again" button -->
            <div id="playAgainDiv" style="display: none;">
                <button id="playAgainButton" class="btn btn-primary-subtle">Play Again</button>
            </div>
        </div>
    <!-- Add this element to your HTML -->
    <div id="completionMessage" class="completion-message">
        <!-- Add this image element to your HTML, initially hidden -->
        <img id="completionImage" src="../images/medal.png" alt="Completion Image" style="display: none;">

        <!-- Bootstrap Modal -->
        <div class="modal fade" id="completionModal" tabindex="-1" aria-labelledby="completionModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- The completion image is displayed here -->
                        <img id="completionImage" src="../images/medal.png" alt="Completion Image">
                        <h2>Congratulations you did it!</h2>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="closeModalButton" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="container fluid p-4 mt-5 shadow rounded mx-auto p-2 bg-gradient navbar-expand-lg fs-5 fixed-bottom bg-light">
        <div>
            <audio id="audioPlayer" controls>
                <source id="audioSource" src="" type="audio/mpeg">
            </audio>
        </div>
    </footer>




    <script src="script.js"></script>
</body>
</html>
