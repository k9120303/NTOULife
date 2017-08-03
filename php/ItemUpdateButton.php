					
						
<?php
	include "db_conn.php";
 
	if( isset($_POST['itemId']) )
	{

		$newItemId = $_POST["itemId"];
		$newItemName = $_POST["itemName"];
		$newItemType = $_POST["itemType"];
		$newPrice = $_POST["price"];
		
		$stmt = $db->prepare("UPDATE item SET itemName = ?,itemType = ?,price = ?
							  WHERE itemId =".$newItemId);
		$stmt->bind_param("ssi",$newItemName,$newItemType,$newPrice);
		$stmt->execute();
		echo "<meta http-equiv='refresh' content='0;url=item.php'>"; 
		
	}
?>
<meta http-equiv="refresh" content="0;url='item.php'"> 