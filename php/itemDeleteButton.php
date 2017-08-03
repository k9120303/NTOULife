<?php
	include "db_conn.php";
 
	if( isset($_POST['itemId']) )
	{
		$id = $_POST['itemId'];
		$stmt = $db->prepare("DELETE FROM item WHERE itemId=?");
		$stmt->bind_param("s",$id);
		$stmt->execute();
	}
?>
<meta http-equiv="refresh" content="0;url='item.php'"> 