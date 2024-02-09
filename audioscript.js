// Add this JavaScript code to your HTML page
document.addEventListener("DOMContentLoaded", function () {
    // Hide all letter containers by default
    document.getElementById('group1Letters').style.display = 'none';
    document.getElementById('group2Letters').style.display = 'none';
    document.getElementById('group3Letters').style.display = 'none';
    document.getElementById('group4Letters').style.display = 'none';
    document.getElementById('group5Letters').style.display = 'none';
    document.getElementById('group6Letters').style.display = 'none';
    document.getElementById('group7Letters').style.display = 'none';
});

function showGroup(groupName) {
    // Hide all letter containers
    document.getElementById('group1Letters').style.display = 'none';
    document.getElementById('group2Letters').style.display = 'none';
    document.getElementById('group3Letters').style.display = 'none';
    document.getElementById('group4Letters').style.display = 'none';
    document.getElementById('group5Letters').style.display = 'none';
    document.getElementById('group6Letters').style.display = 'none';
    document.getElementById('group7Letters').style.display = 'none';

    // Removing the class d-flex
    document.getElementById('group1Letters').classList.remove("d-flex");
    document.getElementById('group2Letters').classList.remove("d-flex");
    document.getElementById('group3Letters').classList.remove("d-flex");
    document.getElementById('group4Letters').classList.remove("d-flex");
    document.getElementById('group5Letters').classList.remove("d-flex");
    document.getElementById('group6Letters').classList.remove("d-flex");
    document.getElementById('group7Letters').classList.remove("d-flex");

    // Show the selected group's letter container
    document.getElementById(groupName + 'Letters').style.display = 'block';
    document.getElementById(groupName + 'Letters').classList.add("d-flex");
}

function playAudio(audioFile) {
    const audioPlayer = document.getElementById('audioPlayer');
    const audioSource = document.getElementById('audioSource');

    // Set the source of the audio element based on the audio file name
    audioSource.src = `../audio/${audioFile}`;

    // Load and play the audio
    audioPlayer.load();
    audioPlayer.play();
}
