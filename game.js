// Elements
const feedbackDiv = document.getElementById('feedback');
const voiceOutputDiv = document.getElementById('voiceOutput');
const carpentryProgressDiv = document.getElementById('carpentryProgress');
const fashionProgressDiv = document.getElementById('fashionProgress');
const startCarpentryBtn = document.getElementById('startCarpentry');
const startFashionBtn = document.getElementById('startFashion');

// Initialize speech synthesis and recognition
const synth = window.speechSynthesis;
const recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();

let voices = [];
let carpentryProgress = 0;
let fashionProgress = 0;

window.onload = function() {
    // Load voices after they are fully available
    window.speechSynthesis.onvoiceschanged = () => {
        loadVoices();
        // Now we can proceed with the rest of the functionality
        speak("Welcome to Sonic Scholar! Please say 'carpentry' or 'fashion'.", 1, 1, 1);

        // Start listening automatically 2 seconds after page load
        setTimeout(() => {
            speak("Listening for your command...", 1, 1, 1);
            recognition.start(); // Start speech recognition
        }, 2000);
    };
};

// Load available voices
function loadVoices() {
    voices = synth.getVoices();
    if (voices.length === 0) {
        // Wait for the voices to be loaded
        window.speechSynthesis.onvoiceschanged = () => {
            voices = synth.getVoices();
        };
    }
}

// Function to speak with voice modulation
function speak(text, rate = 1, pitch = 1, volume = 1) {
    if (synth.speaking) {
        console.error("SpeechSynthesis is already speaking");
        setTimeout(() => {
            speak(text, rate, pitch, volume);
        }, 500);
        return;
    }

    if (text !== '') {
        const utterance = new SpeechSynthesisUtterance(text);
        utterance.rate = rate;
        utterance.pitch = pitch;
        utterance.volume = volume;
        utterance.voice = voices[0] || null; // Use the first available voice

        // Display the text being spoken
        feedbackDiv.textContent = `Speaking: "${text}"`;
        
        synth.speak(utterance);

        // Error handling
        utterance.onerror = function(event) {
            console.error('Speech synthesis error: ', event);
            feedbackDiv.textContent = 'Error in speech synthesis. Please try again.';
        };

        utterance.onend = function() {
            console.log('Speech synthesis finished.');
            feedbackDiv.textContent = ''; // Clear after speaking
        };
    }
}

// Function to start a lesson
function startLesson(section) {
    if (section === 'carpentry') {
        speak("Starting carpentry lesson.", 0.9, 1, 1);
        window.open("Carpentary.php","_self");
    } else if (section === 'fashion') {
        speak("Starting fashion designing lesson.", 1.1, 1, 1);
        window.open("Fashion.php","_self");
    }
}

// Voice Command Recognition
recognition.onstart = function() {
    console.log("Speech recognition service has started");
};

recognition.onspeechend = function() {
    console.log("Speech recognition service disconnected");
    recognition.stop();
    
};

recognition.onresult = function(event) {
    const command = event.results[0][0].transcript.toLowerCase();
    voiceOutputDiv.textContent = `You said: "${command}"`;
    
    if (command.includes('carpentry')) {
        speak("You have selected the carpentry lesson.", 1, 1, 1);
        startLesson('carpentry');
    } else if (command.includes('fashion')) {
        speak("You have selected the fashion designing lesson.", 1, 1, 1);
        startLesson('fashion');
    } else if (command.includes('say again')) {
        speak("Please say 'carpentry' or 'fashion'.", 1, 1, 1);
        document.getElementById('voiceCommand').addEventListener('click', () => {
            speak("Listening for your command...", 1, 1, 1);
            recognition.start();
        });
    }
    else if (command.includes('stop')) {
        recognition.onspeechend();
        if(recognition.onspeechend==true)
        {
            speak(" Thank You we are closing this website!");
            feedbackDiv.textContent = 'Thank You we are closing this website!';
            window.close();
        }
    }
    else if (command.includes('welcome')) {
        recognition.start();
    }else {
        speak("Listening for your command...", 1, 1, 1);
    }
};

// Voice Command Error Handling
recognition.onerror = function(event) {
    console.error('Speech recognition error: ', event.error);
    feedbackDiv.textContent = `Welcome to Sonic Scholar!`;
    speak("Welcome to Sonic Scholar! ", 1, 1, 1);
};

recognition.onend = function() {
    console.log("Speech recognition ended. Restarting...");
    recognition.start(); // Restart speech recognition for continuous listening
};

// Button Listeners for manual start
startCarpentryBtn.addEventListener('click', () => {
    speak("You have clicked the carpentry button.", 1, 1, 1);
    startLesson('carpentry');
});

startFashionBtn.addEventListener('click', () => {
    speak("You have clicked the fashion button.", 1, 1, 1);
    startLesson('fashion');
});

// Start voice recognition
document.getElementById('voiceCommand').addEventListener('click', () => {
    speak("Listening for your command...", 1, 1, 1);
    recognition.start();
});
recognition.start()
// On load, load voices, greet user, and start listening

