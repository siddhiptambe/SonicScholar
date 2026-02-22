<?php  
include 'conn.php';

if (isset($_POST['submit'])) {
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $sel = "SELECT * FROM user WHERE Username = ?";
    $stmt = $conn->prepare($sel);
    $stmt->bind_param("s", $Username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($Password, $row['Password'])) {
            // Set cookies for the user
            setcookie("id", $row['ID_USER'], time() + 60 * 60 * 24 * 30, "/", NULL);
            setcookie("session", $row['Session'], time() + 60 * 60 * 24 * 30, "/", NULL);
            
            echo '<script>
                    alert("Welcome to Sonic Scholar");
                  </script>';
            header("Location: SS_home.php");
            exit();
        }
    }

    // If login fails
    echo '<script>
            alert("INVALID data");
            window.open("login.php", "_self");
          </script>';
}
?>
