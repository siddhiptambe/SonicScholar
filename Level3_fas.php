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
        <h1>Level 3: Stitching the clothes</h1>
        <div class="video-section">
            <video width="1000" height="450" controls muted="true"><source src="video\Level3_Fas.mp4" type="video/mp4"></video>
        </div>
        <div class="description">
            <p id="description-text">
                <b>Description</b>
                <br>
                Steps to sew the clothes:
                <ul>
                    <li>Sewing Order: Start with the shoulder seams, attach the neckband, then sew the sleeves, side seams, and finish with the hem.</li>
                    <li>Stitches for T-shirts:</li>
                        <ul>
                            <li>Use a three or four-thread overlock if you have a serger.</li>
                            <li>If using a regular sewing machine, opt for the overlock stitch or a narrow zigzag stitch for seams. For hemming, a twin needle or cover stitch machine is ideal.</li>
                        </ul>
                    <li>Stabilizing the Shoulder Seams:</li>
                        <ul>
                            <li>Use clear elastic, soft stretch fusible, or stay tape to prevent shoulder seams from stretching during sewing.</li>
                            <li>Sew the shoulder seams and press the seam allowance toward the back.</li>
                        </ul>
                    <li>Attaching the Neckband:</li>
                        <ul>
                            <li>The neckband should always be shorter than the neckline to account for fabric stretch. Divide the neckband and neckline into quarters, match notches, and distribute the stretch evenly.</li>
                            <li>Sew with the neckband facing up and stretch the neckband as you sew.</li>
                        </ul>
                    <li>Attaching the Sleeves:</li>
                        <ul>
                            <li>Attach the sleeves flat (before closing the side seam), aligning the sleeve cap with the armhole. This method is easier and more professional than sewing in a circular motion.</li>
                        </ul>
                    <li>Sewing Side and Sleeve Seams:</li>
                        <ul>
                            <li>Sew the side seam and sleeve seam in one continuous sequence.</li>
                            <li>Press seam allowances in opposite directions to create a flat, smooth intersection.</li>
                        </ul>
                    <li>Hemming:</li>
                        <ul>
                            <li>Press the hem to make it flat, and overlap seam allowances at the side seam for a cleaner finish. For the sleeve hem, start close to the side seam, sew in a circle, overlap, and secure.</li>
                        </ul>
                </ul>
            </p>
        </div>
        <div class="speech-container"></div>
            <button id="start-speech-synthesis-btn" class="btn btn-primary">Read Page Aloud</button>
        </div>
        <div class="button-container">
            <button class="btn btn-custom" onclick="window.open('Fashion.php','_self')">
                <i class="fas fa-backward"></i> Back
            </button>
            <button class="btn btn-custom" onclick="window.open('Quizf.php','_self')">
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
    </script>
</body>
</html>
