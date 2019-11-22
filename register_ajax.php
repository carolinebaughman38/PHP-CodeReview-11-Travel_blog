<?php 
ob_start(); 
session_start();

require_once 'dbconnect.php';

$error = false;

$first_name = isset($_POST['first_name']) ? $_POST['first_name'] : $error = true;
$last_name = isset($_POST['last_name']) ? $_POST['last_name'] : $error = true;
$email = isset($_POST['email']) ? $_POST['email'] : $error = true;
$password = isset($_POST['password']) ? $_POST['password'] : $error = true;
//password hashing for security
	$password = hash('sha256',$password);
if(!$error){
	$query = "INSERT INTO `user`(first_name,last_name,email,password) VALUES ('$first_name','$last_name','$email','$password');";
	if(mysqli_query($conn,$query)){
		echo "Registered successfully!";
	}
}else {
	echo "Error";
}

?>