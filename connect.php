<?php
	$firstName = $_POST['firstName'];
	$secondName = $_POST['secondName'];
	$phone = $_POST['phone'];
	$dob = $_POST['dob'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into reg(firstName, secondName, phone, dob, email, password) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $firstName, $secondName, $phone, $dob, $email, $password);
		$execval = $stmt->execute();
		echo $execval;
		echo "login.html";
		$stmt->close();
		$conn->close();
	}
?>