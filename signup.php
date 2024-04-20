<?php
	$username = $_POST['username '];
	$password = $_POST['password'];
	$email = $_POST['email'];
	
	// Database connection
	$conn = new mysqli('localhost','root','','users');
	if($conn->connect_error){
		
		die("Connection Failed : ". $conn->connect_error);
	} 
	else{
		$stmt = $conn->prepare("insert into registration(username, password, email) values(?, ?, ?)");
		$stmt->bind_param("sss", $username, $password, $email);
		$stmt-> execute();
		echo "Signed up successfully...";
		$stmt->close();
		$conn->close();
	}
?> 