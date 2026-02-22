<?php  
function generateCode($length){
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
	$code = "";
	$clean = strlen($chars) - 1;
	while(strlen($code) < $length){
		$code .= $chars[mt_rand(0, $clean)];
	}
	return $code;
}

include 'conn.php';

	if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['email-submit']))
	{
		$Username=$_POST['Username'];
		$Email=$_POST['Email'];
		$Mobile=$_POST['Mobile'];
		$Password=$_POST['Password'];
		$H_Password = password_hash($Password, PASSWORD_DEFAULT);
		
		$checkUser="SELECT * FROM user WHERE Username = '$Username'";
		$checkEmail="SELECT * FROM user where Email='$Email'";
		$checkMobile="SELECT * FROM user where Mobile='$Mobile'";
		$result1=$conn->query($checkUser);
		$result2=$conn->query($checkEmail);
		$result3=$conn->query($checkMobile);
		if($result1->num_rows){
?>
		<script>
			alert("Username Already in Use!!!!");
			window.open("register.php","_self");
		</script>
<?php
		}
		elseif($result2->num_rows){
?>
			<script>
				alert("Email Already in Use!!!!");
				window.open("register.php","_self");
			</script>
<?php
		}
		elseif($result3->num_rows){
?>
			<script>
				alert("Mobile Number Already in Use!!!!");
				window.open("register.php","_self");
			</script>
<?php
		}
		else{
			$session = generateCode(10);
			$insertUser = $conn->prepare("INSERT INTO user (Username, Email, Mobile, Password, Session) VALUES ('$Username','$Email', $Mobile, '$H_Password', '$session')");
			if ($insertUser->execute()) {
				// Set cookies to remember the user
				setcookie("id", $conn->insert_id, time() + 60 * 60 * 24 * 30, "/", NULL);
				setcookie("session", $session, time() + 60 * 60 * 24 * 30, "/", NULL);
				header("Location: SS_home.php");
				exit();
			} else {
				echo '<script>
						alert("Registration failed. Please try again.");
						window.open("register.php","_self");
					  </script>';
				exit();
			}
		} 
		
	}
?>