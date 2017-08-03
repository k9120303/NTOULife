<html>
	<!-- HTML Head -->
	<head>
		<title>Gamer</title>
		<meta type = "utf-8">
		<link rel = "stylesheet" type = "text/css" href = "../css/main.css">
		<link rel = "stylesheet" type = "text/css" href = "../css/superhero.css">
	</head>

	<!-- HTML Body -->
	<body class="home">
		<!-- HTML Menu -->
		<!--Navbar-->
		<head class="container">	
			<div class="navbar navbar-default">
				<div class="navbar-header">
				<a class="navbar-brand" href="../index.html">海大人生</a>
				</div>
			<ul class="nav navbar-nav">
			<li><a>功能</a></li>
			<li><a>表單</a></li>
			<li><a href="player.php">Player Table</a></li>
			<li><a href="place.php">Place Table</a></li>
			<li><a href="item.php">Item Table</a></li>
			<li><a href="itemBag.php">Item Bag Table</a></li>
			<li><a href="characterInfo.php">Character Table</a></li>
			</ul>
			</div>
		</head>
		<!--MainTable-->
		
		<div class="container">
		<table class="table table-striped table-hover">
			
				
		<!-- Teble -->
		
			<?php
				// Include the php file for database connection.
				include "db_conn.php";

				// Table title.
				echo "<tr>
						<th>Player Id</th>
						<th>Player Name</th>
						<th>Caracter Id</th>
						<th>Character Name</th>
						<th>Gender</th>
						<th>Phrase</th>
						<th>Place Id</th>
						<th>Money</th>
					 </tr>";
			
				// Select data ( player NATURAL JOIN characterInfo ) from database.
				$query = "SELECT * FROM player NATURAL JOIN characterinfo ORDER BY playerId ASC";
				$stmt = $db->query( $query );
				if(!$stmt){echo"false<br>";}
				
				while( $result = mysqli_fetch_object( $stmt ) ) {
					// Print the result.
				
					echo "	<tr>
								<td>" . $result->playerId . "</td>
								<td>" . $result->playerName . "</td>
								<td>" . $result->characterId . "</td>
								<td>" . $result->characterName . "</td>
								<td>" . $result->gender . "</td>
								<td>" . $result->phrase . "</td>
								<td>" . $result->placeId . "</td>
								<td>" . $result->money . "</td>
							</tr>";
				}
				
				// Print the result title.						
				echo "	<tr><td colspan = '8'>&nbsp;</td></tr>
						<tr><td colspan = '8'>Winner ( Maximun money )</td></tr>";
				
				// Select data ( Maximun money ) from database.
				$query = "SELECT * FROM player NATURAL JOIN characterinfo WHERE money in ( SELECT MAX(money) FROM player);";
				$stmt = $db->query( $query );
				while( $result = mysqli_fetch_object( $stmt ) ) {
					// Print the result.
					echo "	<tr>
								<td>" . $result->playerId . "</td>
								<td>" . $result->playerName . "</td>
								<td>" . $result->characterId . "</td>
								<td>" . $result->characterName . "</td>
								<td>" . $result->gender . "</td>
								<td>" . $result->phrase . "</td>
								<td>" . $result->placeId . "</td>
								<td>" . $result->money . "</td>
							</tr>";
				}
				echo"</table></div>";
			?>				

	</body>
</html>
