<?php
    require_once('google-api/google_config.php');
    require_once('class/controller.Class.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style\log.css">
</head>
<body>
<div class="wrapper register-container" style="display= block;">
    <h1>Register</h1>
    <form action="rbackend.php" method="post" class="email-form">
        <div class="input-box">
            <input type="text" id="Username" name="Username" autocomplete="off" placeholder="Username">
            <i class='fas fa-user'></i>
        </div>
        <span class="username-error"> </span>
        <div class="input-box">
            <input type="email" id="Email" name="Email" autocomplete="off" placeholder="Email">
            <i class='fas fa-envelope'></i>
        </div>  
        <span class="email-error"> </span>
        <div class="input-box">
            <input type="tel" id="Mobile" name="Mobile" autocomplete="off" placeholder="Mobile Number" pattern="^\+?[1-9]\d{9,14}$" title="Please enter a valid mobile number. Example: +1234567890 or 1234567890">
            <i class='fas fa-phone'></i> 
        </div>
        <span class="mobile-error"> </span>
        <div class="input-box">
            <input type="password" id="Password" name="Password" autocomplete="off" placeholder="Password" maxlength="12">
            <i class='fas fa-eye-slash show_pass' onclick="togglePassword()"></i>
        </div>
        <span class="password-error"> </span>
        <div class="ent">
            <button type="submit" name="email-submit" class="btn register-submit" style="color: white;">Register</button>
            <p align="center"><b>----------------OR-----------------</b></p>
            <button onclick="window.location = '<?php echo $url; ?>'" type="button" class="btn btn-danger">Login with Google</button>
        </div>
        <div class="register-link">
            <p>Already have an account? <a href="login.php">Login</a></p>
        </div>
    </form>
</div>

<div class="wrapper otp-container" style="display: none;">
    <h2>Enter OTP</h2>
    <form action="" class="form otp-form">
        <div class="input-box">
            <input type="number" name="otp" id="otp" placeholder="Enter OTP...">
            <span class="otp-error"></span>
        </div>
        <button class="btn otp-button">Login</button>
    </form>
</div>
<script>
    function togglePassword() {
        var showPass = document.querySelector(".show_pass");
        var passwordField = document.getElementById("Password");
        if (passwordField.type === "password") {
            passwordField.type = "text";
            showPass.classList.replace("fa-eye-slash","fa-eye");
        } else {
            passwordField.type = "password";
            showPass.classList.replace("fa-eye","fa-eye-slash");
        }
    }
</script>
</body>
</html>