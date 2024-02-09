<?php
// Retrieve letters from the database
$sql = "SELECT letter, audio_file FROM letters";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Generate buttons dynamically
    while ($row = $result->fetch_assoc()) {
        $letter = $row["letter"];
        $audioFile = $row["audio_file"];

        echo '<button class="btn btn-info" onclick="playAudio(\'' . $audioFile . '\')">' . $letter . '</button>';
    }
} else {
    echo "No letters found in the database.";
}

$conn->close();
?>