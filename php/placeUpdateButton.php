<?php
	include "db_conn.php";
	 
	echo"readt to update place<br>";
		
	if( isset($_POST['placeId']) )
	{  
		echo"enter update place function<br>";
		$newPlaceId = $_POST["placeId"];
		$newPlaceName = $_POST["placeName"];
		$newPlaceType = $_POST["placeType"];
		
		$stmt = $db->prepare("UPDATE place SET placeId = ?,placeName = ?,PlaceType = ?
							  WHERE placeId =".$newPlaceId);
		$stmt->bind_param("sss",$newPlaceId,$newPlaceName,$newPlaceType);
		$stmt->execute();
		echo "<meta http-equiv='refresh' content='0;url=place.php'>"; 
	}			
?>

