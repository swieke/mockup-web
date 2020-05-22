<?php
require_once('config.php');
if($_GET){
    if(isset($_GET['email'])){
        $email = $_GET['email'];
        if($email == ''){
            unset($email);
        }
    }
    if(isset($_GET['token'])){
        $token = $_GET['token'];
        if($token == ''){
            unset($token);
        }
    }
    if(!empty($email) && !empty($token)){
        $select = $conn->prepare("SELECT id FROM users WHERE email=:email AND token=:token");
        $select->execute(array(
            'email' => $email,
            'token' => $token
        ));

        if($select->fetchColumn() > 0){
            $update = $conn->prepare("UPDATE users SET confirmation = 1, token='' WHERE email=:email");
            $update->execute(array(
                'email' => $email
            ));
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
	<div style="margin-top : 30vh">
        <h1> <strong>Verification successful! <a href="login.php">Click here</a> to login.</strong></h1>
    </div>
</body>
</html>