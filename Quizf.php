<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz - Sonic Scholars</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style\quiz_f.css">
</head>
<body>

    <div class="container">
        <h1>Fashion Designing Basics Quiz</h1>

        <!-- Quiz Questions -->
        <div id="quiz">

            <!-- Question 1 -->
            <div class="quiz-question" id="question1" style="display: block;">
                1. What is the primary tool used to cut fabric in tailoring?
                <div class="options">
                    <label><input type="radio" name="question1" value="Needle"> Needle</label><br>
                    <label><input type="radio" name="question1" value="Scissors"> Scissors</label><br>
                    <label><input type="radio" name="question1" value="Measuring tape"> Measuring tape</label><br>
                    <label><input type="radio" name="question1" value="Ruler"> Ruler</label>
                </div>
            </div>

            <!-- Question 2 -->
            <div class="quiz-question" id="question2" style="display: none;">
                2. What is the purpose of a seam allowance in tailoring?
                <div class="options">
                    <label><input type="radio" name="question2" value="To add decorative elements
                        "> To add decorative elements
                    </label><br>
                    <label><input type="radio" name="question2" value="To ensure enough fabric is left for alterations
                        "> To ensure enough fabric is left for alterations
                    </label><br>
                    <label><input type="radio" name="question2" value="To hold the fabric together
                        "> To hold the fabric together
                    </label><br>
                    <label><input type="radio" name="question2" value="To prevent fraying"> To prevent fraying</label>
                </div>
            </div>

            <!-- Question 3 -->
            <div class="quiz-question" id="question3" style="display: none;">
                3. Which stitch is commonly used for hemming garments?
                <div class="options">
                    <label><input type="radio" name="question3" value="Basting stitch
                        "> Basting stitch
                    </label><br>
                    <label><input type="radio" name="question3" value="Running stitch
                        "> Running stitch
                    </label><br>
                    <label><input type="radio" name="question3" value="Slip stitch
                        "> Slip stitch
                    </label><br>
                    <label><input type="radio" name="question3" value="Backstitch
                        "> Backstitch
                    </label>
                </div>
            </div>

            <!-- Question 4 -->
            <div class="quiz-question" id="question4" style="display: none;">
                4. What does the term "pattern" refer to in tailoring?
                <div class="options">
                    <label><input type="radio" name="question4" value="The design printed on fabric
                        "> The design printed on fabric
                    </label><br>
                    <label><input type="radio" name="question4" value="The template used to cut fabric pieces
                        "> The template used to cut fabric pieces
                    </label><br>
                    <label><input type="radio" name="question4" value="The thread used for sewing
                        "> The thread used for sewing
                    </label><br>
                    <label><input type="radio" name="question4" value="The type of fabric
                        "> The type of fabric
                    </label>
                </div>
            </div>

            <!-- Question 5 -->
            <div class="quiz-question" id="question5" style="display: none;">
                5. Which of the following is a common type of fabric used in tailoring?
                <div class="options">
                    <label><input type="radio" name="question5" value=" Denim
                        ">  Denim
                    </label><br>
                    <label><input type="radio" name="question5" value="Silk
                        "> Silk
                    </label><br>
                    <label><input type="radio" name="question5" value="Cotton
                        "> Cotton
                    </label><br>
                    <label><input type="radio" name="question5" value="All of the above
                        "> All of the above
                    </label>
                </div>
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
var currentQuestion = 1;
var totalQuestions = 5;

// Correct answers
var correctAnswers = {
    question1: 'Scissors',
    question2: 'To ensure enough fabric is left for alterations',
    question3: 'Slip stitch',
    question4: 'The template used to cut fabric pieces',
    question5: 'All of the above'
};

// Initialize quiz
showQuestion(currentQuestion);


// Function to speak the question and options using speech synthesis
function speakQuestion(questionNumber) {
    var questionText = document.getElementById('question' + questionNumber).textContent;
    var msg = new SpeechSynthesisUtterance(questionText);
    window.speechSynthesis.speak(msg);
}

// Function to show the question and speak it
function showQuestion(questionNumber) {
    // Hide all questions
    for (var i = 1; i <= totalQuestions; i++) {
        document.getElementById('question' + i).style.display = 'none';
    }
    // Show the current question
    document.getElementById('question' + questionNumber).style.display = 'block';
    speakQuestion(questionNumber); // Speak the question

    // Hide "Back" button on the first question
    document.querySelector('.btn-back').style.display = questionNumber === 1 ? 'none' : 'inline-block';
    // Hide "Next" button on the last question, show "Submit" button
    document.querySelector('.btn-next').style.display = questionNumber === totalQuestions ? 'none' : 'inline-block';
    document.querySelector('.btn-submit').style.display = questionNumber === totalQuestions ? 'inline-block' : 'none';
}

// Navigation functions
function nextQuestion() {
    if (currentQuestion < totalQuestions) {
        currentQuestion++;
        showQuestion(currentQuestion);
    }
}

function prevQuestion() {
    if (currentQuestion > 1) {
        currentQuestion--;
        showQuestion(currentQuestion);
    }
}

// Function to submit the quiz
function submitQuiz() {
    var score = 0;

    for (var i = 1; i <= totalQuestions; i++) {
        var selectedOption = document.querySelector('input[name="question' + i + '"]:checked');
        if (selectedOption && selectedOption.value === correctAnswers['question' + i]) {
            score++;
        }
    }

    var resultDiv = document.getElementById('result');
    resultDiv.style.display = 'block';

    var scoreMessage = 3;
    if (score === totalQuestions) {
        scoreMessage = 'Excellent! You scored ' + score + ' out of ' + totalQuestions + '!';
        resultDiv.classList.add('correct');
        resultDiv.classList.remove('incorrect');
    } else {
        scoreMessage = 'You scored ' + score + ' out of ' + totalQuestions + '. Keep practicing!';
        resultDiv.classList.add('incorrect');
        resultDiv.classList.remove('correct');
    }

    resultDiv.textContent = scoreMessage;
    if(scoreMessage<=3)
{
    // Read out the final score
    var msg = new SpeechSynthesisUtterance(scoreMessage);
    
    window.speechSynthesis.speak(msg);
}
else window.open('certificate.php','_self');
}

// Function to start speech recognition for commands and answers
function startRecognition() {
    var recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
    recognition.lang = 'en-US';
    recognition.continuous = false;
    recognition.interimResults = false;

    recognition.start();

    recognition.onresult = function(event) {
        var spokenText = event.results[0][0].transcript.toLowerCase();
        console.log('You said: ', spokenText);
        handleVoiceCommand(spokenText);
    };

    recognition.onerror = function(event) {
        console.error('Speech recognition error', event);
    };

    recognition.onend = function() {
        // Restart the recognition after it ends
        startRecognition();
    };
}

// Function to handle voice commands
function handleVoiceCommand(spokenText) {
    if (spokenText.includes('start')) {
        speakQuestion(currentQuestion);
    } else if (spokenText.includes('next')) {
        nextQuestion();
    } else if (spokenText.includes('back')) {
        prevQuestion();
    } else if (spokenText.includes('submit')) {
        submitQuiz();
    } else {
        // Match the spoken text with the available options
        matchAnswer(spokenText);
    }
}

// Function to match spoken answer to the options
function matchAnswer(spokenAnswer) {
    var options = document.querySelectorAll('input[name="question' + currentQuestion + '"]');
    options.forEach(function(option) {
        if (spokenAnswer.includes(option.value.toLowerCase())) {
            option.checked = true;
        }
    });
}

// Start speech recognition when the page loads
window.onload = function() {
    startRecognition();
};

    </script>

</body>
</html>