<?php 
require('config.php');
if(!empty($_SESSION['logged_in'])) header("Location: index.php");  

# Include PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

# Initialize verification sender email
$hostEmail = 'wardayacollegewebsite@gmail.com';
$hostPassword = 'wardaya123';

if ($_POST) {
	if(isset($_POST['name'])) {
		$name = $_POST['name'];
		if($name == '') {
			unset($name);
		}
	}
	if(isset($_POST['email'])) {
		$email = $_POST['email'];
		if($email == '') {
			unset($email);
		}
	}
	if(isset($_POST['number'])) {
		$number = $_POST['number'];
		if($number == '') {
			unset($number);
		}
	}
	if(isset($_POST['password'])) {
		$password = $_POST['password'];
		if($password == '') {
			unset($password);
		}
	}
	if(!empty($email) && !empty($password) && !empty($email) && !empty($number)) {
		$password = password_hash($password, PASSWORD_DEFAULT);

		function getToken($len = 32) {
			return substr(md5(openssl_random_pseudo_bytes(20)), -$len);
		}

		$token = getToken(10);
		$insert = $conn->prepare("INSERT INTO users SET
			name=:name,
			email=:email,
			number=:number,
			password=:password,
			token=:token");
		$insert->execute(array(
			'name'		=> $name,
			'email'		=> $email,
			'number'	=> $number,
			'password'	=> $password,
			'token'		=> $token
		));
        
        $mail = new PHPMailer(true);
        //Enable SMTP debugging. 
        $mail->SMTPDebug = 0;                               
        //Set PHPMailer to use SMTP.
        $mail->isSMTP();            
        //Set SMTP host name                          
        $mail->Host = "smtp.gmail.com";
        //Set this to true if SMTP host requires authentication to send email
        $mail->SMTPAuth = true;                          
        //Provide username and password     
        $mail->Username = $hostEmail;                
        $mail->Password = $hostPassword;                          
        //If SMTP requires TLS encryption then set it
        $mail->SMTPSecure = "tls";                           
        //Set TCP port to connect to 
        $mail->Port = 587;                 

        try {
            $mail->setFrom('nelayanmabok@gmail.com', 'Wardaya College');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Wardaya College Email Confirmation';
            $mail->Body = 'Hi, '.$name.', please activate your Wardaya College Account to start:
            <a href="http://localhost/wardaya/verification.php?email=' . $email . '&token=' . $token . '">Confirm email</a>';
            $mail->send();
			$output =  'Verification email has been sent to '.$email.', please verify to login.';
			echo "<script type='text/javascript'>alert('$output');</script>";
        } catch (Exception $e) {
            $output = "Verification email cannot be sent, please input a valid email address.";
			echo "<script type='text/javascript'>alert('$output');</script>";
        }
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
	<!-- Boostrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./css/loginstyle.css">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
</head>
<body style="background: #73C2FB">
	<div style="margin-top: 30px; color: white;"><h1>Register Now</h1></div>
	<div class="kotak_login rounded">
		<form action="register.php" method="POST">
			<label>Name</label>
			<input type="text" name="name" class="form_login rounded" placeholder="Enter your name">
			<label>Email</label>
			<input type="email" name="email" class="form_login rounded" placeholder="Enter your email">
			<label>Number</label>
			<input type="text" name="number" class="form_login rounded" placeholder="Enter your phone number">
			<label>Password</label>
			<input type="password" name="password" class="form_login rounded" placeholder="Enter your password">
			<input type="submit" class="tombol_login" value="Register">
			<br/>
			<br/>
			<a class="btn btn-danger btn-block" href="./index.php">Back</a>
		</form>
	</div>
</body>
</html>