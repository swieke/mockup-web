<?php 
	require("config.php"); 
	$message = '';
	if(!empty($_SESSION['logged_in'])) 
	{
		header("Location: index.php");    
	}
    if($_POST){
		$userEmail = $_POST['email'];
		$userPassword = $_POST['password'];
		 
		$query = "SELECT * FROM users WHERE email='$userEmail'";
	
		try{
			$stmt = $conn->prepare($query);
			$stmt->execute();
		}
		catch(PDOException $ex) {
			die("Failed to run query: " . $ex->getMessage());
		}
		$rows = $stmt->fetchObject();
	
		if (!empty($rows)) {
			$email = $rows->email;
			$password = $rows->password;
			$verified = $rows->confirmation;
			if ($email == $userEmail && password_verify($userPassword, $password)) {
				if ($verified) {
					echo "Successful login";
					$id = $rows->id;
					$name = $rows->name;
					$number = $rows->number;
					$_SESSION['logged_in'] = $id;
					$_SESSION['name'] = $name;
					$_SESSION['number'] = $number;
					$_SESSION['email'] = $email;
					header("Location: index.php");
				}
				else {
					$message = "Unverified account, please verify your email.";
					echo "<script type='text/javascript'>alert('$message');</script>";
				}
			}
			else {
				$message = "Wrong password, did you forget it?";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
		}
		else{
			$message = "Login error, please fill in the correct email and password.";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login to Wardaya</title>
	<!-- Boostrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./css/loginstyle.css">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
</head>
<body style="background: #95C8D8">
<div style="margin-top: 30px; color: white;"><h1>Wardaya College Login System</h1></div>
	<div class="kotak_login rounded">
		<form action="login.php" method="POST">
			<label>Email</label>
			<input type="text" name="email" class="form_login rounded" placeholder="Enter your email">
			<label>Password</label>
			<input type="password" name="password" class="form_login rounded" placeholder="Enter your password">
			<input type="submit" class="tombol_login" value="Login">
			<br/>
			<br/>
			<a class="btn btn-danger btn-block" href="./index.php">Back</a>
		</form>
	</div>
</body>
</html>