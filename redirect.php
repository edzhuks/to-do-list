<?php

	//no pievienot_jaunu.php sanem informaciju, kuru ievieto datubaze, tad aiziet uz galveno lapu
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  //$data = htmlspecialchars($data);
	  $data = strip_tags($data, '<a>');
	  return $data;
	}
	
	
	//izvelk pievienojamo no POST
	$merkis = $_POST["merkis"];
	echo $merkis;
	$virs = test_input($_POST["Virsraksts"]);
	$virs = htmlspecialchars($virs);
	echo $virs;
	$apr = test_input($_POST["Apraksts"]);
	echo $apr;
	$id = intval($_POST["id"]);
	echo $id;
	if($_GET["id"] != NULL){
		$id = $_GET["id"];
		$merkis = 'dzest';
	}
	if ($_POST['done'] == '1'){
		$isdone = true;
	}
	echo $isdone;

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

	if($merkis == 'jaunsUzd'){
		//ievieto vertibas datubaze
		if($virs!=NULL){
			$sql = "INSERT INTO Uzdevumi (virsraksts, apraksts, done, izv_datums)
			VALUES ('$virs', '$apr', 0, CURRENT_TIMESTAMP())";
		}
	}
	else if($merkis == 'checkmark'){
		if($isdone == 1){
			$sql = "UPDATE Uzdevumi SET done = true, izv_datums=izv_datums WHERE id = $id";
		}
		else{
			$sql = "UPDATE Uzdevumi SET done = false, izv_datums=izv_datums WHERE id = $id";
		}
	}
	else if($merkis == 'rediget'){
		if($virs!=NULL){
		$sql = "UPDATE Uzdevumi SET virsraksts = '$virs', apraksts = '$apr', izv_datums = izv_datums WHERE id = $id";
		}
	}
	else if($merkis == 'dzest'){
		$sql = "DELETE FROM Uzdevumi WHERE id = $id";
	}

	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

	header("Location:toDoList.php");

?>