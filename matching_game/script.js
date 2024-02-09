const allObjects = [
    // Group one objects
    { image: '../images/sounds_chart/group1/ant.png', audio:'../audio/a.mp3', letter: 'a'},
    { image: '../images/sounds_chart/group1/ink.png', audio:'../audio/i.mp3', letter: 'i'},
    { image: '../images/sounds_chart/group1/net.png', audio:'../audio/n.mp3', letter: 'n'},
    { image: '../images/sounds_chart/group1/puff.png', audio:'../audio/p.mp3', letter: 'p'},
    { image: '../images/sounds_chart/group1/snake.png', audio:'../audio/s.mp3', letter: 's'},
    { image: '../images/sounds_chart/group1/tennis.png', audio:'../audio/t.mp3', letter: 't'},
    
// Group two objects
    { image: '../images/sounds_chart/group2/cat.png', audio:'../audio/ck.mp3', letter: 'ck' },
    { image: '../images/sounds_chart/group2/drum.png', audio:'../audio/d.mp3', letter: 'd' },
    { image: '../images/sounds_chart/group2/egg.png', audio:'../audio/e.mp3', letter: 'e' },
    { image: '../images/sounds_chart/group2/hop.png', audio:'../audio/h.mp3', letter: 'h' },
    { image: '../images/sounds_chart/group2/meal.png', audio:'../audio/m.mp3', letter: 'm' },
    { image: '../images/sounds_chart/group2/rag.png', audio:'../audio/r.mp3', letter: 'r' },

// Group three objects
    { image: '../images/sounds_chart/group3/bat.png', audio:'../audio/b.mp3', letter: 'b' },
    { image: '../images/sounds_chart/group3/fish.png', audio:'../audio/f.mp3', letter: 'f' },
    { image: '../images/sounds_chart/group3/gurgle.png', audio:'../audio/g.mp3', letter: 'g' },
    { image: '../images/sounds_chart/group3/lollipop.png', audio:'../audio/l.mp3', letter: 'l' },
    { image: '../images/sounds_chart/group3/on.png', audio:'../audio/o.mp3', letter: 'o' },
    { image: '../images/sounds_chart/group3/umbrella.png', audio:'../audio/b.mp3', letter: 'b' },

// Group four objects
    { image: '../images/sounds_chart/group4/pain.png', audio:'../audio/ai.mp3', letter: 'ai'},
    { image: '../images/sounds_chart/group4/bee.png', audio:'../audio/ee.mp3', letter: 'ee'},
    { image: '../images/sounds_chart/group4/tie.png', audio:'../audio/ie.mp3', letter: 'ie'},
    { image: '../images/sounds_chart/group4/jam.png', audio:'../audio/j.mp3', letter: 'j'},
    { image: '../images/sounds_chart/group4/goat.png', audio:'../audio/oa.mp3', letter: 'oa'},
    { image: '../images/sounds_chart/group4/fork.png', audio:'../audio/or.mp3', letter: 'or'},

// Group five objects
    { image: '../images/sounds_chart/group5/van.png', audio:'../audio/v.mp3', letter: 'v' },
    { image: '../images/sounds_chart/group5/wind.png', audio:'../audio/w.mp3', letter: 'w' },
    { image: '../images/sounds_chart/group5/buzz.png', audio:'../audio/z.mp3', letter: 'z' },
    { image: '../images/sounds_chart/group5/strong.png', audio:'../audio/ng.mp3', letter: 'ng' },
    { image: '../images/sounds_chart/group5/moon.png', audio:'../audio/moon.mp3', letter: 'OO' },
    { image: '../images/sounds_chart/group5/book.png', audio:'../audio/book.mp3', letter: 'oo' },

// Group six objects
    { image: '../images/sounds_chart/group6/chicken.png', audio:'../audio/ch.mp3', letter: 'ch' },
    { image: '../images/sounds_chart/group6/hush.png', audio:'../audio/sh.mp3', letter: 'sh' },
    { image: '../images/sounds_chart/group6/fox.png', audio:'../audio/x.mp3', letter: 'x' },
    { image: '../images/sounds_chart/group6/yoghurt.png', audio:'../audio/y.mp3', letter: 'y' },
    { image: '../images/sounds_chart/group6/this.png', audio:'../audio/this.mp3', letter: 'TH' },
    { image: '../images/sounds_chart/group6/three.png', audio:'../audio/three.mp3', letter: 'th' },

// Group seven objects
    { image: '../images/sounds_chart/group7/arm.png', audio:'../audio/ar.mp3', letter: 'ar' },
    { image: '../images/sounds_chart/group7/mixer.png', audio:'../audio/er.mp3', letter: 'er' },
    { image: '../images/sounds_chart/group7/oil.png', audio:'../audio/oi.mp3', letter: 'oi' },
    { image: '../images/sounds_chart/group7/ouch.png', audio:'../audio/ou.mp3', letter: 'ou' },
    { image: '../images/sounds_chart/group7/quack.png', audio:'../audio/qu.mp3', letter: 'qu' },
    { image: '../images/sounds_chart/group7/queue.png', audio:'../audio/ue.mp3', letter: 'ue' },
    
    // Add more allObjects and letters as needed
];

let correctAnswers = 0;
const totalObjects = 3; // Change this to 3

// Initialize the game with the first 3 objects
let objectsToDisplay = getRandomObjects(allObjects, totalObjects);
populateGameArea(objectsToDisplay);

// ...

function endGame() {
    // Hide the "Play Audio" button
    document.getElementById('playAudioButton').style.display = 'none';

    // Show the modal
    const modal = new bootstrap.Modal(document.getElementById('completionModal'));
    modal.show();

    // Show the "Play Again" button by displaying the playAgainDiv
    document.getElementById('playAgainDiv').style.display = 'block';

    // Stop audio playback
    stopAudio();

    // Reset the game when the modal is closed
    modal._element.addEventListener('hidden.bs.modal', function () {
        resetGame();
    });
}

// ...

function resetGame() {
    // Hide the "Play Again" button by hiding the playAgainDiv
    document.getElementById('playAgainDiv').style.display = 'none';

    // Show the "Play Audio" button
    document.getElementById('playAudioButton').style.display = 'block';

    // Reset the tally
    correctAnswers = 0;
    updateTally();

    // Clear the completion image
    document.getElementById('completionImage').style.display = 'none';

    // Initialize the game with a new set of 3 objects
    objectsToDisplay = getRandomObjects(allObjects, totalObjects);
    populateGameArea(objectsToDisplay); // Populate the game area with new objects
    playRandomAudio(); // Play audio for the new objects
}

// ...

// Add an event listener for the close button in the modal to prevent page reload
document.getElementById('closeModalButton').addEventListener('click', function (event) {
    // Prevent the default behavior (which can cause a page reload)
    event.preventDefault();

    // Hide the modal
    const modal = new bootstrap.Modal(document.getElementById('completionModal'));
    modal.hide();
});


// Add the event listener for the "Play Again" button
document.getElementById('playAgainButton').addEventListener('click', function () {
    // Reset the game
    resetGame();
});


// ...

function checkAnswer(selectedImage) {
    // Check if the selected image matches the current audio object's image
    if (selectedImage === currentObject.image) {
        // Correct answer
        correctAnswers++;

        // Update the tally display
        updateTally();

        // Check if the game is over
        if (correctAnswers === totalObjects) {
            endGame();
        } else {
            // Continue the game
            playRandomAudio();
        }

        // Replace the correctly answered object with a new one
        replaceCorrectObject();
    } else {
        // Incorrect answer, you can handle this case (e.g., display a message)
        alert('Incorrect! Try again.');
    }
}

function replaceCorrectObject() {
    // Find the index of the correctly answered object in objectsToDisplay
    const indexToRemove = objectsToDisplay.findIndex(obj => obj.image === currentObject.image);

    // Remove the correctly answered object
    objectsToDisplay.splice(indexToRemove, 1);

    // Add a new random object to objectsToDisplay
    objectsToDisplay.push(getRandomObject(allObjects));

    // Refresh the game area with the updated objectsToDisplay
    populateGameArea();
}


document.getElementById('playAgainButton').addEventListener('click', function () {
    // Hide the modal
    const modal = new bootstrap.Modal(document.getElementById('completionModal'));
    modal.hide();

    // Reset the game
    resetGame();
});

// Now, continue with the rest of your code.


function populateGameArea() {
    const gameArea = document.getElementById('gameArea');

    // Clear existing content in the game area
    gameArea.innerHTML = '';

    // Create a tally display
    const tallyDisplay = document.createElement('p');
    tallyDisplay.classList.add("float-md-end");
    tallyDisplay.id = 'tally';
    tallyDisplay.textContent = `Tally: ${correctAnswers} / ${totalObjects}`;
    gameArea.appendChild(tallyDisplay);

    console.log('Debug: populateGameArea called'); // Add this line for debugging

    // Shuffle objectsToDisplay to display them in random order
    objectsToDisplay = shuffleArray(objectsToDisplay);
    console.log('Debug: Shuffled objectsToDisplay', objectsToDisplay); // Add this line for debugging

    // Display the first 3 objects (or fewer if there are fewer remaining)
    const objectsToShow = objectsToDisplay.slice(0, 3);
    console.log('Debug: objectsToShow', objectsToShow); // Add this line for debugging

    for (let i = 0; i < objectsToShow.length; i++) {
        const object = objectsToShow[i];
        const button = document.createElement('button');
        const buttonText = document.createElement('span');
        const buttonImage = document.createElement('img');

        
        button.classList.add("btn");
        button.classList.add("btn-warning");
        button.classList.add("m-3");

        // Set the text content to the object's letter
        buttonText.textContent = object.letter;

        // Create a new image element and set its attributes
        buttonImage.src = object.image; // Set the image source
        buttonImage.alt = object.letter; // Set the alt text

        // Append the text and image to the button
        button.appendChild(buttonImage);
        buttonImage.id = "game_img";
        buttonImage.classList.add("img-fluid");
        buttonImage.style.height = "23vh";
        button.appendChild(buttonText);

        button.addEventListener('click', function () {
            checkAnswer(object.image);
        });

        gameArea.appendChild(button);
    }
}

function getRandomObjects(array, count) {
    const shuffled = array.sort(() => 0.5 - Math.random());
    return shuffled.slice(0, count);
}

// Function to shuffle an array (Fisher-Yates algorithm)
function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
}


document.getElementById('playAgainButton').addEventListener('click', function () {
    // Hide the modal
    const modal = new bootstrap.Modal(document.getElementById('completionModal'));
    modal.hide();

    // Reset the game
    resetGame();
});

// Attach the event listener to the "Play Audio" button
document.getElementById('playAudioButton').addEventListener('click', function () {
    // Call the playRandomAudio function when the button is clicked
    playRandomAudio();
});

function playAudio(audioFile) {
    const audioPlayer = document.getElementById('audioPlayer');
    const audioSource = document.getElementById('audioSource');

    // Set the audio source
    audioSource.src = audioFile;

    // Load and play the audio
    audioPlayer.load();
    audioPlayer.play();
}

function playRandomAudio() {
    // Randomly select an object from the objectsToDisplay array
    currentObject = objectsToDisplay[Math.floor(Math.random() * objectsToDisplay.length)];

    // Set the audio source and play the audio
    const audioFile = currentObject.audio;
    playAudio(audioFile); // Call the playAudio function
}


function updateTally() {
    const tallyDisplay = document.getElementById('tally');
    tallyDisplay.textContent = `Tally: ${correctAnswers} / ${totalObjects}`;
}

function stopAudio() {
    const audioPlayer = document.getElementById('audioPlayer');
    audioPlayer.pause();
    audioPlayer.currentTime = 0; // Reset the audio to the beginning
}

// Call the function to populate the game area when the page loads
window.addEventListener('load', function () {
    populateGameArea(allObjects);
});