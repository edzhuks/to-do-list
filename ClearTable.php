<?php

	// izdzes visus uzdevumus, bet ne pasu tabulu

	$servername = "localhost";
	$username = "root";
	$password = "password";
	$dbname = "toDoList";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	// sql to delete a record
	$sql = "TRUNCATE TABLE Uzdevumi";

	if ($conn->query($sql) === TRUE) {
		echo "Record deleted successfully";
	} else {
		echo "Error deleting record: " . $conn->error;
	}

	$conn->close();
?>