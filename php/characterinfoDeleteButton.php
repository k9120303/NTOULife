<?php
	include "db_conn.php";
 
	if( isset($_POST['characterId']) )
	{
		$id			= $_POST[ "characterId" ];
		$name		= $_POST[ "characterName" ];
		$gender		= $_POST[ "gender" ];
		$phrase		= $_POST[ "phrase" ];
		
		$stmt = $db->prepare("DELETE FROM characterinfo WHERE characterId=?");
		$stmt->bind_param("s",$id);
		$stmt->execute();
	}
?>
<meta http-equiv="refresh" content="0;url='characterInfo.php'"> 