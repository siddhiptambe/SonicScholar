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
        <h1>Level 2: Introduction to Fabrics</h1>
        <div class="video-section">
            <video width="1000" height="450" controls muted="true"><source src="Level2_Fas.mp4" type="video/mp4"></video>
        </div>
        <div class="description">
            <p id="description-text">
                <b>Description</b>
                <br>
                Different types of Fabrics:
                <ul>
                    <li>Cotton: Breathable and durable. Commonly used in shirts, jeans, and dresses.</li>
                    <li>Wool: Water-resistant and insulating. Used for sweaters, suits, and winter wear.</li>
                    <li>Silk: Luxurious with a shiny appearance. Found in formal dresses, blouses, and lingerie.</li>
                    <li>Linen: Lightweight and breathable. Ideal for blazers, pants, and warm-weather dresses.</li>
                    <li>Denim: Sturdy, thick cotton. Used for jeans, jackets, and overalls.</li>
                    <li>Satin: Smooth and glossy. Popular for dresses, gowns, and bed sheets.</li>
                    <li>Chiffon: Sheer and lightweight. Used for scarves and evening gowns.</li>
                    <li>Tweed: Textured woolen fabric. Common in coats, vests, and suits.</li>
                    <li>Flannel: Soft and warm. Perfect for pajamas, robes, and shirts.</li>
                    <li>Velvet: Plush and luxurious. Found in upholstery and dresses.</li>
                    <li>Lace: Openwork fabric. Used as trim for dresses and in curtains.</li>
                    <li>Seersucker: Wrinkled cotton with a striped texture. Ideal for shirts and summer suits.</li>
                    <li>Corduroy: Durable with a ribbed texture. Used for pants, jackets, and upholstery.</li>
                    <li>Fleece: Snug and insulating. Popular for sweatshirts, jackets, and blankets.</li>
                    <li>Nylon: Strong and wrinkle-resistant. Used in swimwear and outerwear.</li>
                    <li>Lycra/Spandex: Stretchable. Found in activewear like leggings and sports bras.</li>
                    <li>Suede: Soft, velvety leather. Used for jackets, shoes, and bags.</li>
                    <li>Polyester: Versatile and durable. Used in clothing and home furnishings.</li>
                    <li>Vinyl: Water-resistant. Used for raincoats, umbrellas, and protective clothing.</li>
                    <li>Terrycloth: Absorbent cotton with loops. Commonly used for towels and robes.</li>
                </ul>
            </p>
        </div>
        <div class="speech-container"></div>
            <button id="start-speech-synthesis-btn" class="btn btn-primary">Read Page Aloud</button>
        </div>
        <div class="button-container">
            <button class="btn btn-custom">
                <i class="fas fa-backward" onclick="window.open('Fashion.php','_self')"></i> Back
            </button>
            <button class="btn btn-custom">
                <i class="fas fa-check" onclick="window.open('Level3_fas.php','_self')"></i> Done
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
