<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html" charset="utf8">
 <link rel="stylesheet" type="text/css" href="../css/theme.css">
 <link rel="stylesheet" type="text/css" href="../css/superhero.css">
<title>item_table</title>
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
    
	function padding(n, width, z) { //width=3 則 輸入2 =>002
	  z = z || '0';
	  n = n + '';
	  return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
	}
	function itemBagEdit(playerId,itemId,number){
		var playerId=padding(playerId,3);
		var itemId=padding(itemId,3);
	    var id=playerId.concat(itemId);

		document.getElementById(id).innerHTML="<tr = '"+id+"'>"+
		"<td><input type='text'name='"+id+"UplayerId'    placeholder='"+playerId+"'></td>"+
		"<td><input type='text'name='"+id+"UitemId'  placeholder='"+itemId+"'></td>"+
		"<td><input type='text'name='"+id+	"Unumber' placeholder='"+number+"'></td>"+
		"<td><button class='btn btn-primary  btn-xs'  name='UpdateButn' onclick='itemBagUpdate("+playerId+","+itemId+")' >Update</button></td></tr>";
		
		}
		function itemBagUpdate(playerId,itemId){
			var playerId=padding(playerId,3);
			var itemId=padding(itemId,3);
			var id=playerId.concat(itemId);

			var UplayerId 	 = document.getElementsByName(id+"UplayerId")[0].value;
			var UitemId  = document.getElementsByName(id+"UitemId")[0].value;
			var Unumber = document.getElementsByName(id+"Unumber")[0].value;
		
			console.log(Unumber);
		    var form=makeform(UplayerId,UitemId,Unumber);
			form.setAttribute("method", "post");
			form.setAttribute("action", "itempBegUpdateButton.php");
			form.submit();
			
		}
	function makeform(playerId,itemId,number){
		var form = document.createElement("form");
		var playerIdField = document.createElement("input");
			playerIdField.setAttribute("type", "text");
			playerIdField.setAttribute("name","playerId" );
			playerIdField.setAttribute("value", playerId);
        var itemIdField = document.createElement("input");
			itemIdField.setAttribute("type", "text");
			itemIdField.setAttribute("name","itemId" );
			itemIdField.setAttribute("value", itemId);
        var numberField = document.createElement("input");
			numberField.setAttribute("type", "text");
			numberField.setAttribute("name","number" );
			numberField.setAttribute("value", number);

			form.appendChild(playerIdField);
			form.appendChild(numberField);
			form.appendChild(itemIdField);
		return form;
	}
	function itemBagDelete(playerId,itemId,number){
		
		var playerId=padding(playerId,3);
		var itemId=padding(itemId,3);
		//number 不用padding
		var form =makeform(playerId,itemId,number);
				
		form.setAttribute("method", "post");
		form.setAttribute("action", "itempBegDeleteButton.php");	
       
		//document.body.appendChild(form);    // Not entirely sure if this is necessary
		form.submit();
	}


</script>
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
				<th>playerId</th>
				<th>itemId</th>
				<th colspan="2">number</th></tr>
			
		


 <?php
 include"db_conn.php";
  //---建立連線-----------
  //--Select * Table--
   $query2="SELECT * FROM itembag";
	if($stmt=$db->query($query2)){
	 while($result=mysqli_fetch_object($stmt)){
		 echo"<tr id=".$result->playerId."".$result->itemId.">";
		 echo"<td>".$result->playerId."</td>";
   	     echo"<td>".$result->itemId."</td>";
   	     echo"<td>".$result->number."</td>";
		 echo"<td><button class='btn btn-info 	   btn-xs'  onclick='itemBagEdit(".$result->playerId.",".$result->itemId.",".$result->number.")'>Edit</button>
			      <button class='btn btn-warning   btn-xs'  onclick='itemBagDelete(".$result->playerId.",".$result->itemId.",".$result->number.")'>Delete</button>
			 </td>";
		 echo"</tr>";
		}
	} 
   //--InsertTable--
	 echo"<tr><form method='post' action=''>
		  <td><input type='text'name='playerId'   placeholder='playerId'></td>
		  <td><input type='text'name='itemId' 	  placeholder='itemId'></td>
		  <td><input type='text'name='number'	  placeholder='number'></td>
		  <td><input class='btn btn-primary  btn-xs'type='submit' name='op'  value='insert'></td>
		  </form></tr>";
	echo"</table></div>";
 if(isset($_POST["op"])) { $submit=$_POST["op"] ;//submit依$_POST["op"]決定接下來的動作

    $playerId=$_POST["playerId"];
    $itemId=$_POST["itemId"];
    $number=$_POST["number"];
	echo $itemId."where is the bug!<br>";
    $stmt=$db->prepare("insert into itembag value(?,?,?)");
    $stmt->bind_param("sss",$playerId,$itemId,$number);
    $stmt->execute(); 
	echo "<meta http-equiv='refresh' content='0;url=itemBag.php'>"; 
}

	 ?>

</body>
 </html>