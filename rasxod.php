<?php 
	$servername = 'localhost';
	$username = 'root';
	$password = 'root';
	$dbname = 'schet';

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die('не подклучено к базе'.$conn->connect_error);
	}
		$purchases = "SELECT * FROM purchase";
		$purchase = $conn->query($purchases);
		if ($purchase->num_rows > 0) {
			while ($rows=$purchase->fetch_assoc()) {
				$purchase_all = $rows;
				$names[] = $rows['name'];
				$prices[] = $rows['price'];
				$numbers[] = $rows['numbers'];
				$times[] = $rows['purchase_time'];
				$batches[] = $rows['batch_number'];
			}
		}

	if ($_SERVER['REQUEST_METHOD']=='POST') {
		
		if ($_POST['browsers']&&$_POST['price']&&$_POST['numbers']) {

			$name = $_POST['browsers'];
			$price = $_POST['price'];
			$numbers = $_POST['numbers'];

			if($_POST['batch_number']){
				$batch = $_POST['batch_number'];
				$sklad = "SELECT id, numbers 
				FROM purchase 
				WHERE name = '$name' 
				AND batch_number = $batch";
			}else {
				$sklad = "SELECT id, numbers FROM purchase WHERE name = '$name' ORDER BY purchase_time asc LIMIT 1";
			}

			$sklad = $conn->query($sklad);

			if ($sklad->num_rows) {
				$skladArr = $sklad->fetch_assoc();
			}else{
				echo "<span class='badge badge-danger'>Продукт не найдено</span>"; 
			}
			if (isset($skladArr['numbers'])) {
				if ($skladArr['numbers'] < $numbers) {
					echo "<span class='badge badge-success'>В складе ".$skladArr['numbers']." штук есть";
				}
			}
			$ostatoks = $skladArr['numbers'] - $numbers;
			$purchase_update = "UPDATE purchase set numbers = $ostatoks WHERE id = ".$skladArr['id'];
			if($conn->query($purchase_update)){
			$selling = "INSERT INTO selling (name, price, numbers) 
			VALUES ('$name', $price, $numbers)";
			if ($conn->query($selling)){
				echo "<span class='badge badge-success'>Продукт продано</span>";
			}
			}else{
				echo "<span class='badge badge-success'> Продукт не продано ".$conn->error."</span>";
			}
			
		}else{
			echo "<span class='badge badge-danger'> Продукт, цена, количество надо заполнит </span>";
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
 		.badge {
 			height: 44px;
 			font-size: 24px;
 			display: flex;
 			justify-content: center;
 			text-align: center;
 		}
 	</style>
 	<title>Document</title>
 </head>
 <body>
 	<ul style="display: flex; list-style: none; margin-top: 10px;" class="justify-content-center">
 		<li><a href="http://mysql/prixod.php" class="btn btn-info mr-4" type="button">Прихода</a></li>
 	    <li><a href="http://mysql/rasxod.php" class="btn btn-info" type="button">Продажа</a></li>
 	</ul>
 	<div class="container"><br>
 		<div class="card">
 			<div class="card-header"><badge>Продат товар</badge></div>
 			<div class="card-body">
		 		<form action="rasxod.php" method="post" class="form-group">
					<label for="browser">Название продукта:</label>
					<input list="browsers" name="browsers" id="browser">
					<datalist id="browsers">
						<?php foreach ($names as $name) {?>
							<option value="<?=$name ?>">
						<? } ?>
					</datalist>
			 		<input type="integer" name="price" class="form-control" placeholder="Продажа цена">
			 		<input type="integer" name="numbers" class="form-control" placeholder="Количество">
			 		<input type="integer" name="batch_number" class="form-control" placeholder="Номер партии если не вибираете товар который поступил первым продаётся">
			 		<button type="submit" class="btn btn-success">Продат</button>
			 	</form>
				<?php
					if (isset($ostatok) && $ostatok>0) {
						echo "<span class='badge badge-danger'>".$name.' '.$sklad." штук не хватает</span>";
					}elseif(isset($ostatok)){
						echo "<span class='badge badge-success'> Вставлено в продажу </span>";
					}
				?>
 			</div>
 		</div>
 	</div>
 </body>
 </html>