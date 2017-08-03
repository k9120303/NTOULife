<!DOCTYPE html>
<html>
<head>

 <meta http-equiv="Content-Type" content="text/html" charset="utf8">
 <script type="text/javascript" src="../js/jquery-2.2.4.min.js"></script>
 <link rel="stylesheet" type="text/css" href="../css/theme.css">
 <link rel="stylesheet" type="text/css" href="../css/superhero.css">
 <title>Place_table</title>
 <script>
	function padding(n, width, z) {
	  z = z || '0';
	  n = n + '';
	  return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
	}
	function placeEdit(placeId,placeName,placeType){
		var id=padding(placeId,3);
		
		var input;
		document.getElementById(id).innerHTML="<tr = '"+id+"'>"+
		"<td><input type='text'name='"+id+"UplaceId'    placeholder='"+id+"'></td>"+
		"<td><input type='text'name='"+id+"UplaceName'  placeholder='"+placeName+"'></td>"+
		"<td><input type='text'name='"+id+"UplaceType' placeholder='"+placeType+"'></td>"+

		"<td><button class='btn btn-primary  btn-xs'  name='UpdateButn' onclick='playerUpdate("+id+")' >Update</button></td></tr>";
		
		}
		function playerUpdate(playerId){
			var id=padding(playerId,3);
			alert(id+"UplaceId");
			var UplaceId 	 = document.getElementsByName(id+"UplaceId")[0].value;
			var UplaceName  = document.getElementsByName(id+"UplaceName")[0].value;
			var UplaceType = document.getElementsByName(id+"UplaceType")[0].value;
			console.log(UplaceId);
		    var form=makeform(UplaceId,UplaceName,UplaceType);
			form.setAttribute("method", "post");
			form.setAttribute("action", "placeUpdateButton.php");
			form.submit();
			
		}
	function makeform(placeId,placeName,placeType){
		var form = document.createElement("form");
		var placeIdField = document.createElement("input");
			placeIdField.setAttribute("type", "text");
			placeIdField.setAttribute("name","placeId" );
			placeIdField.setAttribute("value", placeId);
        var placeNameField = document.createElement("input");
			placeNameField.setAttribute("type", "text");
			placeNameField.setAttribute("name","placeName" );
			placeNameField.setAttribute("value", placeName);
        var placeTypeField = document.createElement("input");
			placeTypeField.setAttribute("type", "text");
			placeTypeField.setAttribute("name","placeType" );
			placeTypeField.setAttribute("value", placeType);
     
			
			form.appendChild(placeIdField);
			form.appendChild(placeNameField);
			form.appendChild(placeTypeField);
			
		return form;
	}
	function placeDelete(placeId,placeName,placeType){
		
		var id=padding(placeId,3);
		alert(id);
		var form =makeform(id,placeName,placeType);
				
		form.setAttribute("method", "post");
		form.setAttribute("action", "placeDeleteButton.php");	
       
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
				<th>placeId</th>
				<th>placeName</th>
				<th colspan="2">placeType</th></tr>

			 <?php
				include"db_conn.php";
			//---建立連線-----------
			 //--Select Table-- 
				$select="SELECT * FROM place";
				if($stmt=$db->query($select)){
					while($result=mysqli_fetch_object($stmt)){
						echo  "<tr id=".$result->placeId.">";
						echo  "<td>".$result->placeId."</td>";
						echo  "<td>".$result->placeName."</td>";
						$tempPn='"'.$result->placeName.'"';        //將字串特處理塞進後面的onclick
						echo  "<td>".$result->placeType."</td>";
						$tempPt='"'.$result->placeType.'"';        //將字串特處理塞進後面的onclick
						echo  "<td> <button class='btn btn-info 	 btn-xs'  onclick='placeEdit(".$result->placeId.",".$tempPn.",".$tempPt.")'>Edit</button>
								    <button class='btn btn-warning   btn-xs'  onclick='placeDelete(".$result->placeId.",".$tempPn.",".$tempPt.")'>Delete</button>
							   </td>";
						echo  "</tr>";
					}
				}
				//--InsertTable--
				 echo"<tr><form method='post' action=''>
					  <td><input type='text'name='placeId'   placeholder='placeId'></td>
					  <td><input type='text'name='placeName' placeholder='placeName'></td>
					  <td><input type='text'name='placeType'placeholder='characterId'></td>
					  <td><input class='btn btn-primary  btn-xs'type='submit' name='op'  value='insert'></td>
					  </form></tr>";
				echo"</table></div>";
			
				if(isset($_POST["op"])) {
					$submit=$_POST["op"] ;
				
					if($submit == "insert"){
					$placeId = $_POST["placeId"];
					$placeName = $_POST["placeName"];
					$placeType = $_POST["placeType"];
					$stmt = $db->prepare("insert into place value(?,?,?)");
					$stmt->bind_param("sss",$placeId,$placeName,$placeType);
					$stmt->execute(); 
					echo "<meta http-equiv='refresh' content='0;url=place.php'>"; 
					}
				}
				
	 ?> 
</body>
 </html>