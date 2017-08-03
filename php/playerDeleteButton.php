<?php
	include "db_conn.php";
    echo"ready to enter Player Delete Function<br>";
	if( isset($_POST['playerId']) )
	{  
		$playerId=$_POST["playerId"];
	    echo$playerId."enter Player Delete Function<br>";
		
		$stmt = $db->prepare("DELETE FROM player WHERE playerId=?");
		$stmt->bind_param("s",$playerId);
		$stmt->execute();
		header('Location: player.php');
	}
	?>
