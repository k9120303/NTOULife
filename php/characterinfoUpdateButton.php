<?php
	include "db_conn.php";
 
	if( isset($_POST['characterId']) )
	{  
		$id			= $_POST[ "characterId" ];
		$name		= $_POST[ "characterName" ];
		$gender		= $_POST[ "gender" ];
		$phrase		= $_POST[ "phrase" ];


		$query = ( "UPDATE characterinfo SET  characterName = ?, gender = ?, phrase = ? WHERE characterId = ".$id );
		$stmt = $db->prepare( $query );
		$stmt->bind_param( "sss", $name, $gender, $phrase );
		$stmt->execute();
	}
?>
<meta http-equiv="refresh" content="0;url='characterInfo.php'"> 