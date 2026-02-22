<?php
    require_once('google-api/google_config.php');
    require_once('class/controller.Class.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sonic Scholar: Voice-Controlled Learning</title>
    <link rel="stylesheet" href="style\home.css"> <!-- Link to external CSS -->
</head>
<body>
<img src="logo.jpg" class="logo">
    <header>
        <h1>Sonic Scholar</h1>
        <p>Interactive Learning through Voice Commands</p>
        <a href="login.php">Login</a>
    </header>
    <main>
        <div id="feedback" class="feedback" role="alert" aria-live="polite"></div> <!-- Feedback area -->
        
        <section id="carpentrySection" class="section" aria-labelledby="carpentry-heading" style="background: url('car.jpg');background-size: cover;background-repeat: no-repeat;">
            <h2 id="carpentry-heading">Carpentry</h2>
            <button id="startCarpentry" class="start-button" onclick="window.open('Carpentary.php','_self')">Start Carpentry Lesson</button>
            <div id="carpentryProgress" class="progress" aria-describedby="carpentryProgressDescription">
                Progress: 0%
            </div>
            <p id="carpentryProgressDescription" class="progress-description">
               
            </p>
        </section>
        
        
        <section id="fashionSection" class="section" aria-labelledby="fashion-heading" style="background: url('fashion.jpg');background-size: cover;background-repeat: no-repeat;">
            <h2 id="fashion-heading">Fashion Designing</h2>
            <button id="startFashion" class="start-button" onclick="window.open('Fashion.php','_self')" > Start Fashion Designing Lesson</button>
            <div id="fashionProgress" class="progress" aria-describedby="fashionProgressDescription">
                Progress: 0%
            </div>
            <p id="fashionProgressDescription" class="progress-description">
               Say "" to increase your fashion designing lesson progress.
            </p> 
        </section>
        
        <button id="voiceCommand" class="voice-button">Give Voice Command</button>
        <div id="voiceOutput" class="voice-output" aria-live="polite"></div>
    </main>
    
    <footer>
        <p>&copy; 2024 Sonic Scholar. All rights reserved.</p>
    </footer>
    <script src="game.js"></script>
</body>
</html>
