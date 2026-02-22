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
        <h1>Level 1: Introduction to Tools</h1>
        <div class="video-section">
            <video width="1000" height="450" controls muted="true"><source src="video\Level1_Car.mp4" type="video/mp4"></video>
        </div>
        <div class="description">
            <p id="description-text">
                <b>Description</b>
                <ul>
                    <li>Introduction to Tools</li>
                    <ul>
                        <li>Tools are physical items used to achieve a goal and are not consumed in the process.</li>
                        <li>Different tools are used in specific fields or activities (e.g., instruments, utensils, machines).</li>
                        <li>Equipment refers to the set of tools needed to achieve a specific goal.</li>
                    </ul>
                    <li>Hand Tools for Carpentry</li>
                    <ul>
                        <li>Chisel: A metal tool with a flat, sharp edge used to cut and shape solid materials.</li>
                        <li>Types of woodworking chisels:</li>
                        <ul>
                            <li>Butt Chisel: Short chisel for resting in the hand, with a square-edged blade.</li>
                            <li>Carving Chisel: Used for sculpting and relief work.</li>
                            <li>Framing Chisel: Long-handled chisel for timber framing and large jobs.</li>
                            <li>Paring Chisel: Long and thin, used for cleaning joints.</li>
                        </ul>
                    </ul>
                    <li>Files:</li>
                    <ul>
                        <li>A tool for smoothing objects, typically metal, with sharp parallel teeth.</li>
                        <li>Types of files:</li>
                        <ul>
                            <li>Diamond File: Used for very hard materials like stone, glass, and hardened steel.</li>
                            <li>Needle File: Small files used for surface finishing.</li>
                            <li>Machine File: Reduces fatigue and improves accuracy.</li>
                        </ul>
                    </ul>
                    <li>Planes:</li>
                    <ul>
                        <li>Tools for shaping wood, flattening surfaces, reducing thickness, and smoothing.</li>
                        <li>Types include bench planes and block planes.</li>
                    </ul>
                    <li>Hammers:</li>
                    <ul>
                        <li>Used to drive or break up materials. Vary in size and weight based on the task.</li>
                        <li>Heavier hammers for framing, roofing, decking; smaller hammers for trim work.</li>
                    </ul>
                    <li>Handsaw:</li>
                    <ul>
                        <li>Known as a panel saw or fish saw, used for cutting wood into various shapes.</li>
                    </ul>
                    <li>Power Tools for Carpentry</li>
                    <ul>
                        <li>Circular Saw:</li>
                            A power saw with a rotating blade, used for cutting materials like wood and plywood.
                        <li>Power Drill:</li>
                            A must-have tool for woodworking and metalworking, used to bore holes in materials.
                        <li>Jigsaw:</li>
                            A power tool for cutting curves and angles in wood, with features for precise cutting.
                        <li>Staple Gun:</li>
                            Used for applications such as insulation, roofing, and furniture making.
                    </ul>
                    <li>Carpentry Procedures</li>
                    <ul>
                        <li>Drilling:</li>
                            A cutting process using a rotary drill bit to create holes in materials. Commonly used in woodworking and metalworking.
                    </ul>
                    <li>Safety Tips:</li>
                    <ul>
                        <li>Use the proper saw, drill bit, and extension cords for each job.</li>
                        <li>Always wear safety glasses or a face shield while working.</li>
                    </ul>
                </ul>
            </p>
        </div>
        <div class="speech-container">
            <button id="start-speech-synthesis-btn" class="btn btn-primary">Read Page Aloud</button>
        </div>
        
        <div class="button-container">
            <button class="btn btn-custom">
                <i class="fas fa-backward" onclick="window.open('Carpentary.php','_self')"></i> Back
            </button>
            <button class="btn btn-custom" onclick="window.open('Level2_car.php','_self')">
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
