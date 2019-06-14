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

<div class="jumbotron text-center">
  <h1>Pievienot jaunu uzdevumu</h1>
</div>

<script>
function ieliktLinku(){
	var url = document.getElementById("url").value;
	var text = document.getElementById("urlText").value;
	document.getElementById("area").value+="<a href=\""+url+"\">"+text+"</a>";
}
</script>

<div class="container">
	<form action="redirect.php" method="post">
		<div class="form-group">
			<label for="Virsraksts">Virsraksts:</label>
			<input type="text" class="form-control" id="Virsraksts" placeholder="Ievadi virsrakstu" name="Virsraksts">
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
			<textarea id="area" class="form-control" rows="5" id="Apraksts" placeholder="Ievadi aprakstu" name="Apraksts"></textarea>
		</div>
		<div class="d-flex">
			<div class="p-2 ">
				<button type="submit" class="btn btn-outline-success">Pievienot</button>
			</div>
			<div class="p-2 ml-auto ">
				<a href="toDoList.php" class=" btn btn-outline-secondary" role="button">Doties atpakaļ</a>
			</div>
		</div>
		<input type='hidden' name="merkis" value="jaunsUzd"> 
</form>



</body>
</html>