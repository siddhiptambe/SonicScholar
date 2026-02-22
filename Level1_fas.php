<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaming Tools Introduction</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style\TrainF.css">
</head>
<body>
    <div class="container">
        <h1>Level 1: Introduction to Types of Stitches</h1>
        <div class="video-section">
            <video width="1000" height="450" controls muted="true">
                <source src="video\Level1_Fas.mp4" type="video/mp4">
            </video>
        </div>
        <div class="description">
            <p id="description-text">
                <b>Description</b>
                <br><br>
                Steps to learn stitching:
                <ul>
                    <li>Prepare the fabric: Pin two pieces of fabric together with the right sides facing each other. Draw a guideline on the fabric to follow while stitching.</li>
                    <li>Start stitching: Push the needle through the underside of the fabric, a stitch-length away from the edge. Pull the needle through until the knot locks in place.</li>
                    <li>Create backstitches: Push the needle back to the starting point, dip it into the fabric, then move forward past the tail of the previous stitch, making sure the needle stays parallel to the fabric.</li>
                    <li>Keep stitches even: Ensure the tail of each stitch bisects the distance between where the needle enters and exits the fabric to maintain even stitches.</li>
                    <li>Tension and finishing: Keep the tension tight enough to set the stitches, but not so tight that the fabric bunches. To knot off, take a tiny stitch, create a loop, and pass the needle through twice before hiding the tail between the stitches and fabric.</li>
                </ul>
            </p>
        </div>
        <div class="speech-container"></div>
        <button id="start-speech-synthesis-btn" class="btn btn-primary">Read Page Aloud</button>
        <div class="button-container">
            <button class="btn btn-custom">
                <i class="fas fa-backward" onclick="window.open('Fashion.php','_self')"></i> Back
            </button>
            <button id="done-button" class="btn btn-custom" onclick="window.open('Level2_fas.php','_self')">
                <i class="fas fa-check"></i> Done
            </button>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function speakText(text) {
            if ('speechSynthesis' in window) {
                const speech = new SpeechSynthesisUtterance(text);
                speech.lang = 'en-US';
                speech.pitch = 1;
                speech.rate = 1;
                speech.volume = 1;
                window.speechSynthesis.speak(speech);
            } 
            else 
            {
                alert('Sorry, your browser does not support speech synthesis.');
            }
        }
        function getAllText() 
        {
            const bodyText = document.body.innerText;
            return bodyText;
        }
        document.getElementById('start-speech-synthesis-btn').addEventListener('click', function() 
        {
            const fullText = getAllText();
            speakText(fullText);
        });
        function startVoiceRecognition() 
        {
            if ('webkitSpeechRecognition' in window) 
        