<?php
	include "db_conn.php";
 
	if( isset($_POST['playerId']) )
	{
		$PId = $_POST['playerId'];
		$ITid = $_POST['itemId'];
		$num = $_POST['number'];
		$stmt = $db->prepare("UPDATE itembag SET number=? WHERE playerId=? AND itemId=?");
		$stmt->bind_param("ssi",$num,$PId,$ITid);
		$stmt->execute();
		header('Location: itembag.php');
	}
?>
