<?php
    require('config.php');
    if ($_POST) {
        $id = (int)$_SESSION["logged_in"];
        if(isset($_POST['name'])) {
            $name = $_POST['name'];
            if($name == '') {
                unset($name);
            }
            else {
                $insert = $conn->prepare("UPDATE users SET name='$name' WHERE id='$id'");
                $success = $insert->execute();
            
                if ($success) $_SESSION['name'] = $name;
            }
        }
        if(isset($_POST['number'])) {
            $number = $_POST['number'];
            if($number == '') {
                unset($number);
            }
            else {
                $insert = $conn->prepare("UPDATE users SET number='$number' WHERE id='$id'");
                $success = $insert->execute();
            
                if ($success) $_SESSION['number'] = $number;
            }
        }
        if(isset($_POST['email'])) {
            $email = $_POST['email'];
            if($email == '') {
                unset($email);
            }
            else {
                $insert = $conn->prepare("UPDATE users SET email='$email' WHERE id='$id'");
                $success = $insert->execute();
            
                if ($success) $_SESSION['email'] = $email;
            }

        }
        header("Location: profile.php");
    }
?>