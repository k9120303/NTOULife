<?php
	include "db_conn.php";
 
	if( isset($_POST['playerId']) )
	{  
		$playerId=$_POST["playerId"];
		$playerName=$_POST["playerName"];
		$characterId=$_POST["characterId"];
		$placeId=$_POST["placeId"];
		$money=$_POST["money"];
		echo$playerId."<br>";
		echo$playerName."<br>";
		echo$characterId."<br>";
		echo$placeId."<br>";
		echo$money."<br>";
		$query = ( "UPDATE player SET  playerName = ?, characterId = ?, placeId = ?, money=? WHERE  playerId  = ".$playerId );
		$stmt = $db->prepare( $query );
		 if (!$stmt) {
        echo "false<br>";
		echo$query."<br>";
		echo $query->error_list."<br>";
    }
		
		$stmt->bind_param( "sssi", $playerName, $characterId, $placeId ,$money  );
		$stmt->execute();
		header('Location: player.php');
	
	
	}
?>
