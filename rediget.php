<html>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="./style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<script>
function ieliktLinku(){
	var url = document.getElementById("url").value;
	var text = document.getElementById("urlText").value;
	document.getElementById("area").value+="<a href=\""+url+"\">"+text+"</a>";
}
</script>

<div class="jumbotron text-center">
  <h1>Labot uzdevumu</h1>
</div>


<div class="container">
	<form action="redirect.php" method="post">
		<input type='hidden' name="merkis" value="rediget"> 
		<div class="form-group">
			<label for="Virsraksts">Virsraksts:</label>
			<input type="text" class="form-control" id="Virsraksts" value=
<?php
			
			// ielade esoso virsrakstu
			
				$id = intval($_GET["id"]);
				
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
				
				$sql = "SELECT virsraksts FROM Uzdevumi WHERE id = $id";
				$result = $conn->query($sql);
				

				if ($result->num_rows > 0) {
				// output data of each row
					while($row = $result->fetch_assoc()) {
						echo "\"".$row["virsraksts"]."\"";
					} 
				}
				else {
					echo "0 results";
				}

				$conn->close();
			
?>
			name="Virsraksts">
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-2">
					<label for="Apraksts">Apraksts:</label>
				</div>
				<div class="col-2">
					<button type=button onclick="ieliktLinku()" class="btn btn-outline-primary btn-links">Pievienot hipersaiti</button>
				</div>
				<div class="col-5">
					<input type="text" class="form-control btn-links" id="url" placeholder="Ievadi URL" >
				</div>
				<div class="col-3">
					<input type="text" class="form-control btn-links" id="urlText" placeholder="Ievadi saites tekstu">
				</div>
			</div>
			<textarea class="form-control" rows="5" id="Apraksts" name="Apraksts">
<?php
			
				// ielade esoso aprakstu
			
					$id = intval($_GET["id"]);
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
					
					$sql = "SELECT virsraksts, apraksts FROM Uzdevumi WHERE id = $id";
					$result = $conn->query($sql);
					

					if ($result->num_rows > 0) {
					// output data of each row
						while($row = $result->fetch_assoc()) {
							echo $row["apraksts"];
						} 
					}
					else {
						echo "0 results";
					}

					$conn->close();
			
?></textarea>
		</div>
		<input type='hidden' name="id" value="<?php $id = intval($_GET["id"]); echo $id; ?>">
		<div class="d-flex justify-content-between">
			<div class="p-2">
				<button type="submit" class="btn btn-outline-success">Saglabāt</button>
			</div>
			<div class="p-2">
				<!--<form action="redirect.php" method="post">
					<button type="submit" class="btn btn-outline-success">Saglabāt</button>
					<input type='hidden' name="merkis" value="dzest"> 
				</form>-->
				<a href="redirect.php?id=<?php $id = intval($_GET["id"]); echo $id; ?>" class=" btn btn-outline-danger" role="button">Dzēst uzdevumu</a>
			</div>
			<div class="p-2">
				<a href="toDoList.php" class=" btn btn-outline-secondary" role="button">Doties atpakaļ</a>
			</div>
		</div>
</form>

</body>
</html>