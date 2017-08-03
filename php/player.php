<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html" charset="utf8">
 <script type="text/javascript" src="../js/jquery-2.2.4.min.js"></script>
 <script type="text/javascript" src="../js/move.js"></script>
 <link rel="stylesheet" type="text/css" href="../css/theme.css">
 <link rel="stylesheet" type="text/css" href="../css/superhero.css">
<title>player_table</title>
<script>

	function padding(n, width, z) {
	  z = z || '0';
	  n = n + '';
	  return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
	}
	function playerEdit(playerId,playerName,characterId,placeId,money){
		var id=padding(playerId,3);
		var cId=padding(characterId,2);
		var pId=padding(placeId,2);
	
		document.getElementById(id).innerHTML="<tr = '"+id+"'>"+
		"<td><input type='text'name='"+id+"UplayerId'    placeholder='"+id+"'></td>"+
		"<td><input type='text'name='"+id+"UplayerName'  placeholder='"+playerName+"'></td>"+
		"<td><input type='text'name='"+id+"UcharacterId' placeholder='"+cId+"'></td>"+
		"<td><input type='text'name='"+id+"UplaceId'	  placeholder='"+pId+"'></td>"+
		"<td><input type='text'name='"+id+"Umoney'	 	  placeholder='"+money+"'></td>"+
		"<td><button class='btn btn-primary  btn-xs'  name='UpdateButn' onclick='playerUpdate("+id+")' >Update</button></td></tr>";
		
		}
		function playerUpdate(playerId){
			var id=padding(playerId,3);
			var UplayerId 	 = document.getElementsByName(id+"UplayerId")[0].value;
			var UplayerName  = document.getElementsByName(id+"UplayerName")[0].value;
			var UcharacterId = document.getElementsByName(id+"UcharacterId")[0].value;
			var UplaceId 	 = document.getElementsByName(id+"UplaceId")[0].value;
			var Umoney 		 = document.getElementsByName(id+"Umoney")[0].value;
			console.log(UcharacterId);
		    var form=makeform(UplayerId,UplayerName,UcharacterId,UplaceId,Umoney);
			form.setAttribute("method", "post");
			form.setAttribute("action", "playerUpdateButton.php");
			form.submit();
			
		}
	function makeform(playerId,playerName,characterId,placeId,money){
		var form = document.createElement("form");
		var playerIdField = document.createElement("input");
			playerIdField.setAttribute("type", "text");
			playerIdField.setAttribute("name","playerId" );
			playerIdField.setAttribute("value", playerId);
        var playerNameField = document.createElement("input");
			playerNameField.setAttribute("type", "text");
			playerNameField.setAttribute("name","playerName" );
			playerNameField.setAttribute("value", playerName);
        var characterIdField = document.createElement("input");
			characterIdField.setAttribute("type", "text");
			characterIdField.setAttribute("name","characterId" );
			characterIdField.setAttribute("value", characterId);
        var placeIdField = document.createElement("input");
			placeIdField.setAttribute("type", "text");
			placeIdField.setAttribute("name","placeId" );
			placeIdField.setAttribute("value", placeId);
		var moneyField = document.createElement("input");
			moneyField.setAttribute("type", "text");
			moneyField.setAttribute("name","money" );
			moneyField.setAttribute("value", money);	
			
			form.appendChild(playerIdField);
			form.appendChild(playerNameField);
			form.appendChild(characterIdField);
			form.appendChild(placeIdField);
			form.appendChild(moneyField);			
		return form;
	}
	function playerDelete(playerId,playerName,characterId,placeId,money){
		
		var id=padding(playerId,3);
		var cId=padding(characterId,2);
		var pId=padding(placeId,2);
		var form =makeform(id,playerName,cId,pId,money);
				
		form.setAttribute("method", "post");
		form.setAttribute("action", "playerDeleteButton.php");	
       
		//document.body.appendChild(form);    // Not entirely sure if this is necessary
		form.submit();
	}
function erase1	(){
	alert("WRYYYYYYY");
	var x=document.getElementsByName("mainTable")[0].innerHTML="";	
	
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
		<form class="navbar-form navbar-right" role="search" action="" method="post">
		<div class="form-group">
		   <input type="text" class="form-control" name="keyword" placeholder="Search">
		</div>
		   <button type="submit" class="btn btn-default" name="search" value="Submit" >Submit</button>
		</form>   
		
		</div>
	</head>
	<!--MainTable-->
	
	<div class="container" name="mainTable">
		<table class="table table-striped table-hover">
			<tr>
				<th>playerId</th>
				<th>playerName</th>
				<th>characterId</th>
				<th>placeId</th>
				<th colspan="2">money</th></tr>
			

 <?php
 include"db_conn.php";
  //---建立連線-----------
  //--Select * Table--
	 $query2="SELECT * FROM player";
	 if($stmt=$db->query($query2)){
		 while($result=mysqli_fetch_object($stmt)){
			 echo"<tr id=".$result->playerId.">";
			 echo"<td>".$result->playerId."</td>";
			 echo"<td>".$result->playerName."</td>";
			 $temp='"'.$result->playerName.'"';        //將字串特處理塞進後面的onclick
			 echo"<td>".$result->characterId."</td>";
			 echo"<td>".$result->placeId."</td>";
			 echo"<td>".$result->money."</td>";
			 echo"<td><button class='btn btn-info 	   btn-xs'  onclick='playerEdit(".$result->playerId.",".$temp.",".$result->characterId.",".$result->placeId.",".$result->money.")'>Edit</button>
			          <button class='btn btn-warning   btn-xs'  onclick='playerDelete(".$result->playerId.",".$temp.",".$result->characterId.",".$result->placeId.",".$result->money.")'>Delete</button>
				  </td>";
			 echo"</tr>";
			 }
	 }
  //--InsertTable--
	 echo"<tr><form method='post' action=''>
		  <td><input type='text'name='playerId'   placeholder='playerId'></td>
		  <td><input type='text'name='playerName' placeholder='playerName'></td>
		  <td><input type='text'name='characterId'placeholder='characterId'></td>
		  <td><input type='text'name='placeId'    placeholder='placeId'></td>
		  <td><input type='text'name='money'	   placeholder='money'></td>
	      <td><input class='btn btn-primary  btn-xs'type='submit' name='op'  value='insert'></td>
		  </form></tr>";
	echo"</table></div>";
  //--Switch Submit Type--
	 if(isset($_POST["op"])) { 
		$submit=isset($_POST["op"]);//submit依$_POST["op"]決定接下來的動作
	    switch($submit){ 
			case "insert" :
				$playerId=$_POST["playerId"];
				$playerName=$_POST["playerName"];
				$characterId=$_POST["characterId"];
				$placeId=$_POST["placeId"];
				$money=$_POST["money"];
				
				$stmt=$db->prepare("insert into player value(?,?,?,?,?)");
				$stmt->bind_param("ssssi",$playerId,$playerName,$characterId,$placeId,$money);
				$stmt->execute(); 
				echo "<meta http-equiv='refresh' content='0;url=player.php'>"; 
				break;
	    }
	}
	//--Search Table---
	
					if(isset($_POST["search"])) {
					
					$keyword = $_POST["keyword"];
					if($keyword == ''){
					  $keyword = '%';
				    }else{
					  $keyword = '%'.$keyword.'%';
				    }
					
					
					
					$search = "SELECT * FROM player WHERE  playerName= ?";
					$stmt = $db->prepare($search);
					$stmt->bind_param("s",$keyword);
					$stmt->execute(); 
					//echo "<meta http-equiv='refresh' content='0;url=place.php'>"; 
					echo"<div class='container'><table class='table table-striped table-hover'>
							<tr><td colspan='5'>          Result</td></tr>
							<tr>
							<th>playerId</th>
							<th>playerName</th>
							<th>characterId</th>
							<th>placeId</th>
							<th>money</th>
							</tr>";
					while($result = $db->fetch($stmt)){
						 echo"<tr >";
						 echo"<td>".$result->playerId."</td>";
						 echo"<td>".$result->playerName."</td>";
						 echo"<td>".$result->characterId."</td>";
						 echo"<td>".$result->placeId."</td>";
						 echo"<td>".$result->money."</td>";
						
						echo  "</tr>";
					}
					echo "</table></div>";
				}
	 ?>
	

</body>
 </html>