<?php
    require('config.php');
    if(!empty($_SESSION['logged_in'])) 
	{
        $name = $_SESSION['name'];
        $number = $_SESSION['number'];
        $id = $_SESSION['logged_in'];
        $email = $_SESSION['email'];
	}
	else {
		header("Location: index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="./css/loginstyle.css">	
	<!-- Boostrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./css/loginstyle.css">
	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
</head>
<body style="background: #217C7E;">
	<div style="margin-top: 30px; color: white;"><h1>Edit Profile</h1></div>
    
    <div class="kotak_login rounded">
		<form action="update.php" method="POST">
			<label>Name</label>
			<input type="text" name="name" class="form_login rounded" placeholder="<?php echo $name?>">
			<label>Email</label>
			<input type="email" name="email" class="form_login rounded" placeholder="<?php echo $email?>">
			<label>Number</label>
			<input type="text" name="number" class="form_login rounded" placeholder="<?php echo $number?>">
			<input type="submit" class="tombol_login" value="Save profile">
			<br/>
			<br/>
			<a class="btn btn-danger btn-block" href="./index.php">Back</a>
		</form>
	</div>
</body>
</html>