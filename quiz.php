<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz - Sonic Scholars</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style\quiz_car.css">
</head>
<body>

    <div class="container">
        <h1>Carpentry Basics Quiz</h1>

        <!-- Start Quiz Button -->
        <button id="startQuizButton" class="btn btn-primary" onclick="startQuiz()">Start Quiz</button>

        <!-- Voice Output -->
        <div id="voiceOutput"></div>
        <div id="feedback"></div>

        <!-- Quiz Questions -->
        <div id="quiz" style="display: none;">
            <!-- Question 1 -->
            <div class="quiz-question" id="question1" style="display: none;">
                <p>1. What is the primary tool used to cut wood?</p>
                <p>A) Hammer</p>
                <p>B) Saw</p>
                <p>C) Screwdriver</p>
                <p>D) Chisel</p>
            </div>
            <!-- Question 2 -->
            <div class="quiz-question" id="question2" style="display: none;">
                <p>2. Which type of joint is commonly used in woodworking to connect two pieces of wood at a right angle?</p>
                <p>A) Dovetail joint</p>
                <p>B) Butt joint</p>
                <p>C) Miter joint</p>
                <p>D) Mortise and tenon joint</p>
            </div>
            <!-- Question 3 -->
            <div class="quiz-question" id="question3" style="display: none;">
                <p>3. What type of wood is often used for framing in construction due to its strength and cost-effectiveness?</p>
                <p>A) Oak</p>
                <p>B) Pine</p>
                <p>C) Mahogany</p>
                <p>D) Maple</p>
            </div>
            <!-- Question 4 -->
            <div class="quiz-question" id="question4" style="display: none;">
                <p>4. Which of the following tools is used to smooth the surface of wood?</p>
                <p>A) Sander</p>
                <p>B) Router</p>
                <p>C) Band saw</p>
                <p>D) Clamps</p>
            </div>
            <!-- Question 5 -->
            <div class="quiz-question" id="question5" style="display: none;">
                <p>5. What is the purpose of a carpenter's square?</p>
                <p>A) To measure the length of wood</p>
                <p>B) To check for squareness and mark angles</p>
                <p>C) To hold pieces of wood together</p>
                <p>D) To cut wood</p>
            </div>

            <!-- Navigation Buttons -->
            <div class="navigation">
                <button class="btn-back btn btn-primary" onclick="prevQuestion()" style="display: none;">Back</button>
                <button class="btn-next btn btn-primary" onclick="nextQuestion()">Next</button>
                <button class="btn-submit btn btn-success" onclick="submitQuiz()" style="display: none;">Submit Quiz</button>
            </div>

            <!-- Quiz Result -->
            <div id="result" class="quiz-result" style="margin-top: 20px;">
                <button onclick="window.open('certificate.php','_self');">Submit</button>
            </div>
        </div>
    </div>

    <script>
        let currentQuestion = 1;
        let totalQuestions = 5; // Total number of questions
        let score = 0;
        const voiceOutputDiv = document.getElementById('voiceOutput');
        const feedbackDiv = document.getElementById('feedback'); 
        let recognition; // Declare recognition variable globally

        function submitQuiz()
        {
            window.open('certificate.php','_self');
        }
        // Correct answers mapped to question numbers
        const correctAnswers = {
            1: "B", // Saw
            2: "B", // Butt joint
            3: "B", // Pine
            4: "A", // Sander
            5: "B"  // To check for squareness and mark angles
        };

        // Initialize speech synthesis and recognition
        const synth = window.speechSynthesis;
        const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

        if (SpeechRecognition) {
            recognition = new SpeechRecognition();
            recognition.continuous = true; // Keep recognition running
            recognition.interimResults = false; // Only capture final results
            recognition.lang = 'en-US'; // Set language

            recognition.onresult = function(event) {
                const command = event.results[event.results.length - 1][0].transcript.trim().toUpperCase();
                if (voiceOutputDiv) {
                    voiceOutputDiv.textContent = `You said: "${command}"`;
                }
                processCommand(command);
            };

            recognition.onerror = function(event) {
                console.error('Recognition error:', event.error);
                speak("I didn't quite catch that. Please say 'start' to begin.", 1, 1, 1);
            };

            recognition.onend = function() {
                console.log('Recognition ended. Restarting...');
                recognition.start(); // Automatically restart recognition for continuous listening
            };
        } else {
            alert("Speech Recognition API not supported in this browser.");
        }

        // Start voice command recognition
        function startCommandRecognition() {
            recognition.start(); // Start recognition
        }

        // Process the voice command
        function processCommand(command) {
            console.log(`Command received: ${command}`);

            // Check if the command includes 'start the quiz'
            if (command.includes('START')) {
                startQuiz();
                return;
            }

            // Check for answers A, B, C, D
            if (['A', 'B', 'C', 'D'].includes(command)) {
                const userAnswer = command; // User's answer
                if (correctAnswers[currentQuestion] === userAnswer) {
                    score++;
                }
                nextQuestion(); // Move to the next question
                return;
            }

            // If user says 'score' after the quiz
            if (command === 'SCORE' && currentQuestion > totalQuestions) {
                readScore(); // Read out the score
                return;
            }

            // If command is not recognized
            speakIncorrectCommand();
        }

        // Function to read out the score
        function readScore() {
            const speech = new SpeechSynthesisUtterance(`Your score is ${score} out of ${totalQuestions}.`);
            window.speechSynthesis.speak(speech);
        }

        // Speak when the command is incorrect
        function speakIncorrectCommand() {
            const speech = new SpeechSynthesisUtterance("Sorry, I didn't understand that. Please try again.");
            window.speechSynthesis.speak(speech);
        }

        // Start the quiz
        function startQuiz() {
            currentQuestion = 1;
            score = 0;
            showQuestion(currentQuestion);
            document.getElementById('quiz').style.display = 'block'; // Show the quiz
            document.querySelector('.btn-next').style.display = 'block';
            document.querySelector('.btn-submit').style.display = 'none';
            document.querySelector('.btn-back').style.display = 'none';
            startCommandRecognition(); // Start listening for commands
        }

        // Show question based on question number
        function showQuestion(questionNumber) {
            for (let i = 1; i <= totalQuestions; i++) {
                const questionElement = document.getElementById('question' + i);
                if (questionElement) {
                    questionElement.style.display = 'none'; // Hide all questions
                }
            }

            const currentElement = document.getElementById('question' + questionNumber);
            if (currentElement) {
                currentElement.style.display = 'block'; // Show current question
                speakQuestionAndOptions(questionNumber); // Speak the question and options
            }
        }

        // Speak the current question and its options
        function speakQuestionAndOptions(questionNumber) {
            const questionText = document.getElementById('question' + questionNumber).innerText;
            const speech = new SpeechSynthesisUtterance(questionText);
            window.speechSynthesis.speak(speech);
        }

        // Move to the next question
        function nextQuestion() {
            if (currentQuestion < totalQuestions) {
                currentQuestion++;
                showQuestion(currentQuestion);
                updateNavigationButtons();
            } else {
                showResult();
            }
        }

        // Go to the previous question
        function prevQuestion() {
            if (currentQuestion > 1) {
                currentQuestion--;
                showQuestion(currentQuestion);
                updateNavigationButtons();
            }
        }

        // Show the quiz result
        function showResult() {
            const resultElement = document.getElementById('result');
            resultElement.innerHTML = `<h2>Your Score: ${score} out of ${totalQuestions}</h2>`;
            resultElement.style.display = 'block';
            document.getElementById('quiz').style.display = 'none'; // Hide quiz
            document.querySelector('.btn-next').style.display = 'none';
            document.querySelector('.btn-submit').style.display = 'none';
        }

        // Update navigation buttons
        function updateNavigationButtons() {
            document.querySelector('.btn-back').style.display = (currentQuestion > 1) ? 'block' : 'none';
            document.querySelector('.btn-submit').style.display = (currentQuestion === totalQuestions) ? 'block' : 'none';
        }

        // Start loading voices
        function loadVoices() {
            const voices = synth.getVoices();
            if (command.includes('START')) {
                startQuiz();
                return;
            }
            console.log('Available voices:', voices); // Log available voices for debugging
        }

        // Initialize voices on load

        loadVoices();
    </script>
</body>
</html>
