<?php
require_once('class/controller.Class.php');   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate of Completion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }

        .certificate {
            background-color: white;
            border: 8px solid #0066cc;
            padding: 40px;
            max-width: 500px;
            width: 100%;
            height: 450px; /* Increased height for better spacing */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative; /* Relative positioning for potential decorations */
        }

        img {
            width: 140px;
            height: 140px;
            margin-bottom: 10px;
        }

        h1 {
            color: #1774bb;
            font-size: 28px;
            margin: 10px 0; /* Added margin for spacing */
        }

        h2 {
            font-size: 24px; /* Slightly reduced size for better alignment */
            margin: 10px 0; /* Added margin for spacing */
        }

        .recipient {
            font-size: 24px;
            color: #1f7bb8;
            margin: 20px 0;
        }    

        .date {
            color: #666;
            margin-top: 10px;
            font-size: 18px; /* Adjusted size for better visibility */
        }

        @media print {
            body {
                background-color: white;
            }
            .certificate {
                box-shadow: none;
            }
        }
    </style>
</head>
<body>
    <div class="certificate">
        <img src="logo.jpg" alt="Sonic Scholars Logo">
        <h1>Sonic Scholars</h1><br>
        <h2>CERTIFICATE OF COMPLETION</h2>
        <p>Presented to </p>
        <p class="recipient" id="recipientName">
        <?php
        if (isset($_COOKIE["id"]) && isset($_COOKIE["session"])) {
            $Controller = new Controller;
            if ($Controller->checkUserStatus($_COOKIE["id"], $_COOKIE["session"])) {    
                $userid = $_COOKIE['id'];
                $db = new Connect;
                $user = $db->prepare('SELECT Username FROM user WHERE ID_USER = :id');
                $user->bindParam(':id', $userid, PDO::PARAM_INT);
                $user->execute();
                while ($userInfo = $user->fetch(PDO::FETCH_ASSOC)) {
?>
                <b><?php echo ($userInfo["Username"]); ?></b>
<?php
                }
            }
            else{
                echo "Error";
            }
        }
        else{
            echo "no cookie detected";
        }
?>
        </p>
        <p>For successfully completing a free online learn and skill-up game</p><br>
        <p class="date">(5th August 2024)</p> <!-- Corrected date format -->
    </div>
</body>
</html>

