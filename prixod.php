<?php 
	$servername = 'localhost';
	$username = 'root';
	$password = 'root';
	$dbname = 'schet';

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die('not connected'.$conn->connect_error);
	}
	
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		$name = $_POST['name'];
		$price = $_POST['price'];
		$numbers = $_POST['numbers'];
		$purchase_time = $_POST['purchase_time'];
		$batch_number = $_POST['batch_number'];

		$sql = "INSERT INTO purchase (name, price, numbers, purchase_time, batch_number) VALUES ('$name', $price, $numbers, '$purchase_time', $batch_number)";
		if ($conn->query($sql)) {
			echo "saved succesfully";
		}else{
			echo "not connected".$conn->error;
		}
	}
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
 	<script src="../bootstrap.min.js"></script>
 	<style>
 		.form-control{
 			margin-bottom: 14px;
 		}
 	</style>
 	<title>Document</title>
 </head>
 <body>
 	<ul style="display: flex; list-style: none; margin-top: 10px;" class="justify-content-center">
 		<li><a href="http://mysql/prixod.php" class="btn btn-info mr-4" type="button">Прихода</a></li>
 	    <li><a href="http://mysql/rasxod.php" class="btn btn-info" type="button">Расхода</a></li>
 	</ul>
 	<div class="container"><br>
 		<div class="card">
 			<div class="card-header"><badge>Приход товара</badge></div>
 			<div class="card-body">	
		 		<form action="prixod.php" method="post" class="form-group">
			 		<input type="text" name="name" class="form-control" placeholder="Название продукта">
			 		<input type="integer" name="price" class="form-control" placeholder="Приходная цена">
			 		<input type="integer" name="numbers" class="form-control" placeholder="Количество">
			 		<input type="datetime-local" data-date-format="YYYY MM DD" name="purchase_time" class="form-control" placeholder="Дата прихода">
			 		<input type="integer" name="batch_number" class="form-control" placeholder="Номер партии товара">
			 		<button type="submit" class="btn btn-success">Создат</button>
			 	</form>
 			</div>
 		</div>
 	</div>
 </body>
 </html>