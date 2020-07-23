<?php

	session_start();

	header('location: login.php');

	$con = mysqli_connect('localhost', 'root');
	if($con){
		echo "Connection success<br>";
	}else{
		echo "No success<br>";
	}
	mysqli_select_db($con, 'sessionpractical');

	$name = $_POST['user'];
	$pass = $_POST['password'];

	$query = "SELECT * FROM register WHERE name = '$name' OR password = '$pass'";
	$result = mysqli_query($con, $query);

	$num = mysqli_num_rows($result);

	if($num == 1){
		echo "Duplicate data";
	}else{
		$qy = "INSERT INTO register(name, password) VALUES('$name','$pass')";
		mysqli_query($con, $qy);
	}

?>