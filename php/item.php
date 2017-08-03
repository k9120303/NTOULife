<!DOCTYPE html>
<html>
<head>

 <meta http-equiv="Content-Type" content="text/html" charset="utf8">
 <link rel="stylesheet" type="text/css" href="../css/theme.css">
 <link rel="stylesheet" type="text/css" href="../css/superhero.css">
 	<script>
/*function playerEdit(playerId){
	alert("Hello! I am an alert box!!");
	
	$('#playerId').hide();

}

$(document).ready(function(){
    $("#123:button").click(function(){
        $("td").html("Hello <b>world!</b>");
    });
});

*/
	function padding(n, width, z) {
	  z = z || '0';
	  n = n + '';
	  return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
	}
	function ItemEdit(itemId,itemName,itemType,price){
		var id=padding(itemId,3);
		document.getElementById(id).innerHTML="<tr = '"+id+"'>"+
		"<td><input type='text'name='"+id+"UitemId'    placeholder='"+id+"'></td>"+
		"<td><input type='text'name='"+id+"UitemName'  placeholder='"+itemName+"'></td>"+
		"<td><input type='text'name='"+id+"UitemType' placeholder='"+itemType+"'></td>"+
		"<td><input type='text'name='"+id+"Uprice'	  placeholder='"+price+"'></td>"+
		
		"<td><button class='btn btn-primary  btn-xs'  name='UpdateButn' onclick='itemUpdate("+id+")' >Update</button></td></tr>";
		
		}
	function itemUpdate(playerId){
		var id=padding(playerId,3);
		var UitemId 	 = document.getElementsByName(id+"UitemId")[0].value;
		var UitemName  = document.getElementsByName(id+"UitemName")[0].value;
		var UitemType = document.getElementsByName(id+"UitemType")[0].value;
		var Uprice 	 = document.getElementsByName(id+"Uprice")[0].value;
		var form=makeform(UitemId,UitemName,UitemType,Uprice);
		form.setAttribute("method", "post");
		form.setAttribute("action", "ItemUpdateButton.php");
		form.submit();
		
	}
	function makeform(itemId,itemName,itemType,price){
		var form = document.createElement("form");
		var itemIdField = document.createElement("input");
			itemIdField.setAttribute("type", "text");
			itemIdField.setAttribute("name","itemId" );
			itemIdField.setAttribute("value", itemId);
        var itemNameField = document.createElement("input");
			itemNameField.setAttribute("type", "text");
			itemNameField.setAttribute("name","itemName" );
			itemNameField.setAttribute("value", itemName);
        var itemTypeField = document.createElement("input");
			itemTypeField.setAttribute("type", "text");
			itemTypeField.setAttribute("name","itemType" );
			itemTypeField.setAttribute("value", itemType);
        var priceField = document.createElement("input");
			priceField.setAttribute("type", "text");
			priceField.setAttribute("name","price" );
			priceField.setAttribute("value", price);
		
			form.appendChild(itemIdField);
			form.appendChild(itemNameField);
			form.appendChild(itemTypeField);
			form.appendChild(priceField);		
		return form;
	}
	function itemDelete(itemId,itemName,itemType,price){
		
		var itemId=padding(itemId,3);
		
		var form =makeform(itemId,itemName,itemType,price);
				
		form.setAttribute("method", "post");
		form.setAttribute("action", "itemDeleteButton.php");	
       
		//document.body.appendChild(form);    // Not entirely sure if this is necessary
		form.submit();
	}
</script>
 <title>Item</title>
</head>

<body class="home">
	<!--Navbar-->
	<head class="container">	
		<div class="navbar navbar-default">
			<div class="navbar-header">
			<a class="navbar-brand" href="../index.html">海大人生</a>
			</div>
		<ul class="nav navbar-nav">
		<li><a>功能</a></li>
		<li><a>表單</a></li>
		<li><a href="player.php">Player Table</a></li>
		<li><a href="place.php">Place Table</a></li>
		<li><a href="item.php">Item Table</a></li>
		<li><a href="itemBag.php">Item Bag Table</a></li>
		<li><a href="characterInfo.php">Character Table</a></li>
		</ul>
		</div>
	</head>
	<!--MainTable-->
	
	<div class="container">
		<table class="table table-striped table-hover">
			<tr>
				<th>itemId</th>
				<th>itemName</th>
				<th>itemType</th>
				
				<th colspan="2">price</th></tr>
	
	
		<center>
			 <?php
				include"db_conn.php";
				//---建立連線-----------
				//--Select * Table--
				$select="SELECT * FROM item";
					if($stmt=$db->query($select)){
						while($result=mysqli_fetch_object($stmt)){
							echo  "<tr id=".$result->itemId.">";
							echo  "<td>".$result->itemId."</td>";
							echo  "<td>".$result->itemName."</td>";
							$tempIn='"'.$result->itemName.'"';        //將字串特處理塞進後面的onclick
							echo  "<td>".$result->itemType."</td>";
						    $tempIt='"'.$result->itemType.'"';        //將字串特處理塞進後面的onclick
							echo  "<td>".$result->price."</td>";
							echo  "<td> <button class='btn btn-info 	 btn-xs'  onclick='ItemEdit(".$result->itemId.",".$tempIn.",".$tempIt.",".$result->price.")'>Edit</button>
										<button class='btn btn-warning   btn-xs'  onclick='itemDelete(".$result->itemId.",".$tempIn.",".$tempIt.",".$result->price.")'>Delete</button>
							   </td>";
						echo  "</tr>";
						}
					}
					
				 //--InsertTable--
				 echo"<tr><form method='post' action=''>
					  <td><input type='text'name='itemId'   placeholder='itemId'></td>
					  <td><input type='text'name='itemName' placeholder='itemName'></td>
					  <td><input type='text'name='itemType'placeholder='itemType'></td>
					  <td><input type='text'name='price'    placeholder='price'></td>
					  <td><input class='btn btn-primary  btn-xs'type='submit' name='op'  value='insert'></td>
					  </form></tr>";
				 echo"</table></div>";
				if(isset($_POST["op"])) { 
					$submit=$_POST["op"] ;//submit依$_POST["op"]決定接下來的動作
						if($submit == "insert"){
						$itemId = $_POST["itemId"];
						$itemName = $_POST["itemName"];
						$itemType=$_POST["itemType"];
						$price=$_POST["price"];
						$stmt=$db->prepare("insert into item value(?,?,?,?)");
						$stmt->bind_param("sssi",$itemId,$itemName,$itemType,$price);
						echo "<meta http-equiv='refresh' content='0;url=item.php'>"; 
						$stmt->execute(); 
					}
				
				}
	 ?> 
		<center>
	</div>
</body>
</html>