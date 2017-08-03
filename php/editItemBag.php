<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="utf8">
		<link rel="stylesheet" type="text/css" href="../css/main.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<title>editItemBag</title>
	</head>

	<body class="home">
		<header class="container">
			<div class="row">
				<h1 class="col-sm-4">海大人生</h1>
				<nav class="col-sm-8 text-right">
				  <p>功能</p>
				  <p>表單</p>
				  <p><a href="player.php">Player Table</a></p>
				  <p><a href="characterInfo.php">Character Table</a></p>
				  <p><a href="place.php">Place Table</a></p>
				  <p><a href="item.php">Item Table</a></p>
			      <p><a href="itemBag.php">ItemBag Table</a></p>
				</nav>
			</div>
		</header>
		
		<div id = "display">
			<center>
				<?php
					include "db_conn.php";
					 
					$PId = $_GET['PId'];
					$ITid = $_GET['ITid'];
					$num = $_GET['num'];
					
					echo "<table>
							<tr>
								<th>欄位</th>
								<th>型態</th>
								<th>原值</th>
								<th>值</th>
							</tr>";			
					echo "<tr>
							<td>playerId</td>
							<td>varchar(255)</td>
							<td>".$PId."</td>
							<td rowspan = '3'>
								<form method='post'>
									<input type = 'text' name = 'newPlayerId' placeholder = 'Ex.Trump'><br>
									<input type = 'text' name = 'newItemId' placeholder = 'Ex.Dice'><br>
									<input type = 'text' name = 'newNumber' placeholder = 'Ex.666'>
									<input type = 'submit' name = 'submit' value = 'edit'>
								</form>";
					echo "<tr>
							<td>itemId</td>
							<td>varchar(255)</td>
							<td>".$ITid."</td>";
					echo "<tr>
							<td>number</td>
							<td>integer</td>
							<td>".$num."</td>";
						
					if(isset($_POST["submit"])){
						$newPlayerId = $_POST["newPlayerId"];
						$newItemId = $_POST["newItemId"];
						$newNumber = $_POST["newNumber"];
						
						$stmt = $db->prepare("UPDATE itembag SET playerId = ?,itemId = ?,number = ?
											  WHERE playerId =".$PId);
						$stmt->bind_param("ssi",$newPlayerId,$newItemId,$newNumber);
						$stmt->execute();
						echo "<meta http-equiv='refresh' content='0;url=itemBag.php'>"; 
					}			
				?>				
			</center>
		</div>
	</body>
</html>