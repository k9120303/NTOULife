<?php
	include "db_conn.php";
 
	if( isset($_POST['playerId']) )
	{
		$PId = $_POST['playerId'];
		$ITid = $_POST['itemId'];
		$num = $_POST['number'];
		$stmt = $db->prepare("DELETE FROM itembag WHERE playerId=? AND itemId=? AND number=?");
		$stmt->bind_param("ssi",$PId,$ITid,$num);
		$stmt->execute();
	}
?>
<meta http-equiv="refresh" content="0;url='itembag.php'"> 