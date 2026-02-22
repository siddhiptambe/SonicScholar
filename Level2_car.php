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
        <h1>Level 2: Introduction to Woods</h1>
        <div class="video-section">
            <video width="1000" height="450" controls muted="true"><source src="video\Level2_Car.mp4" type="video/mp4"></video>
        </div>
        <div class="description">
            <p id="description-text">
                <b>Description</b>
                <br>
                Types of wood for carpentering:
                <ul>
                    <li>SPF Lumber:</li>
                        <ul>
                            <li>SPF stands for Spruce, Pine, Fir.</li>
                            <li>Common in big-box stores, cheap and lightweight, but only partially dried.</li>
                            <li>Prone to twisting, bowing, cupping, and cracking as it dries.</li>
                            <li>Ideal for construction, but not for decorative woodworking due to instability.</li>
                        </ul>
                    <li>Soft Maple:</li>
                        <ul>
                            <li>Inexpensive, easy to machine, and has the hardness similar to walnut.</li>
                            <li>Can be stained with vibrant colors or left as is.</li>
                            <li>Not to be confused with hard maple, which is heavier.</li>
                        </ul>
                    <li>Poplar:</li>
                    <ul>
                        <li>Soft and easy to machine.</li>
                        <li>Great for painted projects or gel-stained to mimic cherry or walnut.</li>
                        <li>Prone to denting, but dents can be repaired with a household iron.</li>
                    </ul>
                    <li>Beech:</li>
                    <ul>
                        <li>Fine-grained, dense, and lightweight.</li>
                        <li>Inexpensive wood from Europe, used in furniture.</li>
                        <li>Not suitable for staining; best with clear finishes.</li>
                    </ul>
                    <li>Knotty Alder:</li>
                    <ul>
                        <li>Soft like poplar, but features knots for rustic styles.</li>
                        <li>Popular for Southwest-style furniture and decorative woodwork.</li>
                    </ul>
                    <li>White Oak:</li>
                    <ul>
                        <li>Heaviest and hardest of the five woods.</li>
                        <li>Has a distinct grain pattern and a warm tan color.</li>
                        <li>Great for outdoor projects as it's durable and resistant to water and sunlight.</li>
                        <li>Used in the U.S. for barrels (bourbon and whiskey production).</li>
                        <li>Comes in different cuts like flatsawn and quartersawn.</li>
                    </ul>
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
            <button class="btn btn-custom" onclick="window.open('Level3_car.php','_self')">
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
