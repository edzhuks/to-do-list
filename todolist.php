<!DOCTYPE html>
<html lang="lv">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="./style.css">
  <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>



<div class="jumbotron text-center">
  <h1>DARĀMO LIETU SARAKSTS</h1>
</div>
  
  <!-- uzdevuma kartinas sablons testesanai -->
  
<!--
<div class="container">      
<div class="row">
	<div class="col-sm-10">
		<div class="cardd">
			<div class="card-body">
				<div class="d-flex">
					<div class="p-2 ">
						<form action="checkbox_redirect.php" method="post">
							<label class="check-container">
								<input type='hidden' name="id" value="1"> 
								<input type="checkbox" class="styled" id="inlineCheckbox2md" value="1" name="done" onclick="this.form.submit();">
								<span class="checkmark"></span>
							</label>
						</form>
					</div>
					<div class="p-2 ">
						<h3>Column 1</h3>
					</div>
					<div class="p-2 ml-auto ">
						<a href="rediget.php?id=3" class=" btn btn-outline-secondary btn-block poga poga-labot" role="button">Labot</a>
					</div>
				</div>
				<div class="row neg-mar">
					<div class="col-xl-10">
						<p class="apraksts" >One solution to the problem above is to have multiple stylesheets in development, but concatenate them in</p>
					</div>
					<div class="col-xl-2">
						<p class="time"> pirms 3 dienām </p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-2">
		<a href="pievienot_jaunu.php" class="btn btn-outline-secondary" role="button">Pievienot jaunu</a>
	</div>
</div>
</div>
-->

<div class="container">
	<div class="row">
		<div class="col-sm-10">
			<?php
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

			//izvelas visus laukus no uzdevumu saraksta, sakarto pec iveidosanas/labosanas daatuma
			$sql = "SELECT id, virsraksts, apraksts, done, izv_datums FROM Uzdevumi ORDER BY izv_datums DESC";
			$result = $conn->query($sql);


			// veido kartinu katram uzdevumam
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo 	"<div class=\"cardd\">
								<div class=\"card-body\">
									<div class=\"d-flex\">
										<div class=\"p-2 \">
											<form action=\"redirect.php\" method=\"post\">
												<label class=\"check-container\">
													<input type='hidden' name=\"merkis\" value=\"checkmark\"> 
													<input type='hidden' name=\"id\" value=".$row["id"]."> 
													<input type=\"hidden\" name=\"done\" value=\"0\" />
													<input type=\"checkbox\" class=\"styled\" id=\"inlineCheckbox2md\" value=\"1\" name=\"done\" onclick=\"this.form.submit();\"";
													//parbauda vai ir izpildits, veido checkbox
													if($row["done"]==true){ 
														echo "checked";
													}
					echo 							">					
													<span class=\"checkmark\"></span>
												</label>
											</form>
										</div>
										<div class=\"p-2 \">
											<h3>" .$row["virsraksts"] ."</h3> 
										</div>
										<div class=\"p-2 ml-auto \">
											<a href=\"rediget.php?id=".$row["id"]."\" class=\" btn btn-outline-secondary btn-block poga poga-labot\" role=\"button\">Labot</a>
										</div>
									</div> 
									<div class=\"row neg-mar\">
										<div class=\"col-xl-10\">
											<p class=\"apraksts\" > ". $row["apraksts"] ."</p>
										</div>
										<div class=\"col-xl-2\">
											<p class=\"time\">";
												// formate datumu
												if(strtotime($row[izv_datums]) >= strtotime("today")) {
													echo "Šodien";
												}
												else if(strtotime($row[izv_datums]) >= strtotime("yesterday")){
													echo "Vakar";
												}
												else{
												echo "pirms ";
												echo floor((time() - strtotime($row[izv_datums]))/(24*60*60));
												echo " dienām";
												}
					echo					"</p>
									
										</div>
									</div>
								</div>
							</div>";
				}
			}
			else {
				echo "Nav neviena uzdevuma";
			}
			$conn->close();
			?>
		</div>
		<div class="col-sm-2">
			<a href="pievienot_jaunu.php" class="btn btn-outline-secondary" role="button">Pievienot jaunu</a>
		</div>
	</div>
</div>

</body>
</html>