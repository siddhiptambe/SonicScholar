// car.js

// Elements
const voiceOutputDiv = document.getElementById('voiceOutput');
const feedbackDiv = document.getElementById('feedback'); 
const startCarpentryBtn = document.getElementById('startCarpentry');

// Stages for Carpentry Lesson with corresponding links
const stages = [
    { name: 'Materials', link: 'Level1_car.php' }, // Fixed the extra quote
    { name: 'Tools', link: 'Level2_car.php' },
    { name: 'Techniques', link: 'Level3_car.php' },
    { name: 'Practice', link: 'practice.php' }
];
let currentStage = 0;

// Initialize speech synthesis and recognition
const synth = window.speechSynthesis;
const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
const recognition = new SpeechRecognition();

// Configure Speech Recognition
recognition.continuous = true; // Keep recognition running
recognition.interimResults = false; // Only capture final results
recognition.lang = 'en-US'; // Set language

let voices = [];

// Function to load voices
function loadVoices() {
    voices = synth.getVoices();
    console.log('Available voices:', voices); // Log available voices for debugging

    if (voices.length > 0) {
        speak("Welcome to Sonic Scholar Carpentry Game and Skill Development.", 1, 1, 1);

        // Start listening automatically after a brief pause
        setTimeout(() => {
            speak("Listening for your command. Please say 'start' to begin the lesson.", 1, 1, 1);
            recognition.start(); // Start speech recognition
        }, 3000); // Increased delay for better experience
    } else {
        synth.onvoiceschanged = loadVoices;
    }
}

// Function to speak with voice modulation
function speak(text, rate = 1, pitch = 1, volume = 1) {
    if (synth.speaking) {
        console.error("SpeechSynthesis is already speaking");
        return; // Prevent overlapping speech
    }

    if (text !== '') {
        const utterance = new SpeechSynthesisUtterance(text);
        utterance.rate = rate; // Adjust rate for clarity
        utterance.pitch = pitch; // Adjust pitch for better understanding
        utterance.volume = volume; // Adjust volume as needed

        // Select a clear and available voice
        utterance.voice = voices.find(voice => voice.name.toLowerCase().includes('google') && voice.lang.includes('en')) || voices[0];

        // Display the text being spoken for visual feedback
        if (feedbackDiv) {
            feedbackDiv.textContent = `Speaking: "${text}"`;
        }

        synth.speak(utterance);

        // Error handling for speech synthesis
        utterance.onerror = function(event) {
            console.error('Speech synthesis error:', event.error);
            if (feedbackDiv) {
                feedbackDiv.textContent = 'Error in speech synthesis. Please try again.';
            }
        };

        utterance.onend = function() {
            console.log('Speech synthesis finished.');
            if (feedbackDiv) {
                feedbackDiv.textContent = ''; // Clear after speaking
            }
        };
    }
}

// Function to open the current stage link
function openStageLink() {
    if (currentStage < stages.length) {
        window.open(stages[currentStage].link, '_self'); // Open the stage link in the same tab
    }
}

// Function to start a lesson
function startLesson() {
    if (currentStage < stages.length) {
        speak(`Starting the ${stages[currentStage].name} module.`, 1, 1, 1);
        openStageLink(); // Open the current stage link
    } else {
        speak("All modules have already been completed.", 1, 1, 1);
    }
}

// Function to mark stage completion
function completeStage() {
    speak(`You have completed stage ${currentStage + 1}.`, 1, 1, 1);
    currentStage++;

    if (currentStage < stages.length) {
        speak(`Next, you can work on the ${stages[currentStage].name} module.`, 1, 1, 1);
        openStageLink(); // Open the next stage link
    } else {
        speak("Congratulations! You have completed all stages.", 1, 1, 1);
        alert('Congratulations! You have completed all stages.'); // Show alert when all stages are complete
    }
}

// Voice Command Recognition Handlers
recognition.onresult = function(event) {
    const command = event.results[event.results.length - 1][0].transcript.trim().toLowerCase();
    if (voiceOutputDiv) {
        voiceOutputDiv.textContent = `You said: "${command}"`;
    }
    console.log(`Command received: "${command}"`);

    if (command.includes('start')) {
        startLesson(); // Start the first lesson
    } else if (command.includes('complete')) {
        completeStage(); // Complete the current stage
    } else {
        speak("Command not recognized. Please say 'start' or 'complete'.", 1, 1, 1);
    }
};

// Error handling for recognition
recognition.onerror = function(event) {
    console.error('Recognition error:', event.error);
    speak("I didn't quite catch that. Please say 'start' to begin.", 1, 1, 1);
};

// Restart recognition if it stops unexpectedly
recognition.onend = function() {
    console.log('Recognition ended. Restarting...');
    recognition.start(); // Automatically restart recognition for continuous listening
};

// Start carpentry when the button is clicked
if (startCarpentryBtn) {
    startCarpentryBtn.addEventListener('click', startLesson);
}

// Attach event listeners for stage buttons after DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    const stage1 = document.getElementById('stage1');
    const stage2 = document.getElementById('stage2');
    const stage3 = document.getElementById('stage3');
    const stage4 = document.getElementById('stage4');

    // Add event listener for stage 1
    if (stage1) {
        stage1.addEventListener('click', function() {
            this.classList.add('completed');
            this.disabled = true;
            if (stage2) stage2.disabled = false; // Enable next stage
            updateConnector('line1');
            speak("Materials stage completed. Say 'start' to proceed to the next stage.", 1, 1, 1);
            completeStage(); // Manually complete stage after clicking
        });
    }

    // Add event listener for stage 2
    if (stage2) {
        stage2.addEventListener('click', function() {
            this.classList.add('completed');
            this.disabled = true;
            if (stage3) stage3.disabled = false; // Enable next stage
            updateConnector('line2');
            speak("Tools stage completed. Say 'start' to proceed to the next stage.", 1, 1, 1);
            completeStage(); // Manually complete stage after clicking
        });
    }

    // Add event listener for stage 3
    if (stage3) {
        stage3.addEventListener('click', function() {
            this.classList.add('completed');
            this.disabled = true;
            if (stage4) stage4.disabled = false; // Enable next stage
            updateConnector('line3');
            speak("Techniques stage completed. Say 'start' to proceed to the next stage.", 1, 1, 1);
            completeStage(); // Manually complete stage after clicking
        });
    }

    // Add event listener for stage 4
    if (stage4) {
        stage4.addEventListener('click', function() {
            this.classList.add('completed');
            this.disabled = true;
            speak("Practice stage completed. Congratulations! You have completed all stages.", 1, 1, 1);
            alert('Congratulations! You have completed all stages.'); // Show alert for completion
        });
    }
});

// Function to update connectors based on completion
function updateConnector(lineId) {
    const connector = document.getElementById(lineId);
    if (connector) {
        connector.classList.add('completed-line');
    }
}

// Initialize voices on load
loadVoices();
