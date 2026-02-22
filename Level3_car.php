<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaming Tools Introduction</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style\levels.css">
</head>
<body>
    <div class="container">
        <h1>Level 3: Using the tools</h1>
        <div class="video-section">
            <video width="1000" height="450" controls muted="true"><source src="video\Level3_Car.mp4" type="video/mp4"></video>
        </div>
        <div class="description">
            <p id="description-text">
                <b>Description</b>
                <br>
                Steps for using tools:
                <ul>
                    <li>Speed Square: Versatile tool for marking and measuring angles.</li>
                    <li>6-in-1 Screwdriver: Multi-purpose screwdriver for various applications, including hardware installation.</li>
                    <li>End Cut Pliers: Great for cutting and pulling nails.</li>
                    <li>Utility Blade: Useful for cutting materials like sheetrock and opening packages.</li>
                    <li>Hammer: A straight-claw hammer is preferred for both finish and rough carpentry.</li>
                    <li>Sliding T-Bevel: For transferring and creating angles.</li>
                    <li>Wood Chisel (3/4 inch): Handy for fine adjustments and hinge work.</li>
                    <li>Nail Set: Essential for setting nails in place.</li>
                    <li>Pry Bar Scraper: Great for prying and scraping materials, as well as preventing finger injuries.</li>
                    <li>Tape Measure: Personal preference, but a 25-foot tape is often ideal.</li>
                    <li>Flat Pry Bar: A demo tool for prying and pulling nails.</li>
                    <li>Chalk Line: Creates long, straight lines on various materials.</li>
                    <li>Torpedo Level: Small, convenient level for quick checks.</li>
                    <li>2-Foot Level: Suitable for tight spaces; a 4-foot level is recommended for more accuracy on larger projects.</li>
                </ul>
            </p>
        </div>
        <div class="speech-container"></div>
            <button id="start-speech-synthesis-btn" class="btn btn-primary">Read Page Aloud</button>
        </div>
        <div class="button-container">
            <button class="btn btn-custom" onclick="window.open('Carpentary.php','_self')">
                <i class="fas fa-backward" ></i> Back
            </button>
            <button class="btn btn-custom" onclick="window.open('quiz.php','_self')">
                <i class="fas fa-check"></i> Done
            </button>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function speakText(text) 
        {
            if ('speechSynthesis' in window) 
            {
                const speech = new SpeechSynthesisUtterance(text);
                speech.lang = 'en-US';  
                speech.pitch = 1;       
                speech.rate = 1;        
                speech.volume = 1;      

                window.speechSynthesis.speak(speech);
            } else 
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
    </script>
</body>
</html>