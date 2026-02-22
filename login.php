<?php
    require_once('google-api/google_config.php');
    require_once('class/controller.Class.php');   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style\log.css">
    
</head>
<body>
<?php
if (isset($_COOKIE["id"]) && isset($_COOKIE["session"])) {
    $Controller = new Controller;
    if ($Controller->checkUserStatus($_COOKIE["id"], $_COOKIE["session"])) {
        $id = $_COOKIE['id'];
        $db = new Connect;
        
        // Use parameterized query to prevent SQL injection
        $user = $db->prepare('SELECT * FROM user WHERE ID_USER = :id');
        $user->bindParam(':id', $id, PDO::PARAM_INT);
        $user->execute();
?>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
<?php
            while ($userInfo = $user->fetch(PDO::FETCH_ASSOC)) {
?>
                <tr>
                    <td><?php echo htmlspecialchars($userInfo["Username"], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><img style="max-width: 50px;" src="<?php echo $userInfo["Avatar"] ?>" alt="User Avatar"></td>
                    <td><?php echo htmlspecialchars($userInfo["Email"], ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
<?php
            }
?>
            </tbody>
        </table>
        <a href="SS_home.php">Home</a>
        <a href="logout.php">Logout</a>
<?php
    } else {
        echo "Error";
    }
}
else{
?>
<div class="wrapper">
    <h1>Login</h1>
    <form action="lbackend.php" method="post">
        <div class="input-box">
            <input type="text" class="us" name="Username" placeholder="Username" autocomplete="off" required>
            <i class='fas fa-user' style="color:blue;"></i>
        </div>
        <div class="input-box">
            <input type="password" id="password" name="Password" placeholder="Password" autocomplete="off" maxlength="12" required>
            <i class='fas fa-eye-slash show_pass' onclick="togglePassword()"></i>
        </div>
        <div class="ent">
            <button type="submit" name="submit" class="btn" style="color: white;">Login</button><br>
            <p align="center"><b>----------------OR-----------------</b></p>
            <button onclick="window.location = '<?php echo $url; ?>'" type="button" class="btn btn-danger">Login with Google</button>
        </div><br>
        <div class="register-link">
            <p>Don't have any account? <a href="register.php">Register</a></p>
        </div>
    </form>
<?php
}
?>
</div>

<script>
    function togglePassword() {
        var showPass = document.querySelector(".show_pass");
        var passwordField = document.getElementById("password");
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