<?php
	include "db_conn.php";
 
	if( isset($_POST['placeId']) )
	{
		$id = $_POST['placeId'];
		$stmt = $db->prepare("DELETE FROM place WHERE placeId=?");
		$stmt->bind_param("s",$id);
		$stmt->execute();
	}
?>
<meta http-equiv="refresh" content="0;url='place.php'"> 