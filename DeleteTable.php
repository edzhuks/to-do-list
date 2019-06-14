<?php
	$servername = "localhost";
	$username = "root";
	$password = "password";
	$dbname = "toDoList";

	//Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	//Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	echo "Connected successfully";


	$sql = "DROP TABLE Uzdevumi";
	if ($conn->query($sql) === TRUE) {
		echo "Table MyGuests created successfully";
	} else {
		echo "Error creating table: " . $conn->error;
	}


	$conn->close();

?>