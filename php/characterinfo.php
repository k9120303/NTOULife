<html>
	<!-- HTML Head -->
	<head>
		<title>Character</title>
		<meta type = "utf-8">
		<link rel = "stylesheet" type = "text/css" href = "../css/main.css">
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
	function charEdit(characterId,characterName,gender,phrase){
		var id=padding(characterId,3);

	
		document.getElementById(id).innerHTML="<tr = '"+id+"'>"+
		"<td><input type='text'name='"+id+"UcharacterId'    placeholder='"+id+"'></td>"+
		"<td><input type='text'name='"+id+"UcharacterName'  placeholder='"+characterName+"'></td>"+
		"<td><input type='text'name='"+id+"Ugender' placeholder='"+gender+"'></td>"+
		"<td><input type='text'name='"+id+"Uphrase'	  placeholder='"+phrase+"'></td>"+
		
		"<td><button class='btn btn-primary  btn-xs'  name='UpdateButn' onclick='charUpdate("+id+")' >Update</button></td></tr>";
		
		}
	function charUpdate(playerId){
		var id=padding(playerId,3);
		var UcharacterId 	 = document.getElementsByName(id+"UcharacterId")[0].value;
		var UcharacterName  = document.getElementsByName(id+"UcharacterName")[0].value;
		var Ugender = document.getElementsByName(id+"Ugender")[0].value;
		var Uphrase 	 = document.getElementsByName(id+"Uphrase")[0].value;

		console.log(UcharacterId);
		var form=makeform(UcharacterId,UcharacterName,Ugender,Uphrase);
		form.setAttribute("method", "post");
		form.setAttribute("action", "characterinfoUpdateButton.php");
		form.submit();
		
	}
	function makeform(characterId,characterName,gender,phrase){
		var form = document.createElement("form");
		var characterIdField = document.createElement("input");
			characterIdField.setAttribute("type", "text");
			characterIdField.setAttribute("name","characterId" );
			characterIdField.setAttribute("value", characterId);
        var characterNameField = document.createElement("input");
			characterNameField.setAttribute("type", "text");
			characterNameField.setAttribute("name","characterName" );
			characterNameField.setAttribute("value", characterName);
        var genderField = document.createElement("input");
			genderField.setAttribute("type", "text");
			genderField.setAttribute("name","gender" );
			genderField.setAttribute("value", gender);
        var phraseField = document.createElement("input");
			phraseField.setAttribute("type", "text");
			phraseField.setAttribute("name","phrase" );
			phraseField.setAttribute("value", phrase);
		
			form.appendChild(characterIdField);
			form.appendChild(characterNameField);
			form.appendChild(genderField);
			form.appendChild(phraseField);		
		return form;
	}
	function charDelete(characterId,characterName,gender,phrase){
		
		var characterId=padding(characterId,3);
		
		var form =makeform(characterId,characterName,gender,phrase);
				
		form.setAttribute("method", "post");
		form.setAttribute("action", "characterinfoDeleteButton.php");	
       
		//document.body.appendChild(form);    // Not entirely sure if this is necessary
		form.submit();
	}


</script>
	</head>

	<!-- HTML Body -->
	<body class="home">
		<!-- HTML Menu -->
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
						<th>Character Id</th>
						<th>Character Name</th>
						<th>Gender</th>
						<th colspan="2">Phrase</th></tr>
					

	
	<?php
		// Include the php file for database connection.
		include "db_conn.php";
		// Search the database , and show in the table.
		$query = "Select * from characterinfo";
		if ( $stmt = $db->query( $query ) ) {
			while ( $result = mysqli_fetch_object( $stmt ) ) {
				echo "	<tr id=".$result->characterId.">
							<td>" . $result->characterId . "</td>
							<td>" . $result->characterName . "</td>";
							$tempCN='"'.$result->characterName.'"';        //將字串特處理塞進後面的onclick
				echo	   "<td>" . $result->gender . "</td>";
							$tempGender='"'.$result->gender.'"';        //將字串特處理塞進後面的onclick
				echo	   "<td>" . $result->phrase . "</td>";
							$tempPhrase='"'.$result->phrase.'"';        //將字串特處理塞進後面的onclick
				echo	   "<td><button class='btn btn-info 	   btn-xs'  onclick='charEdit(".$result->characterId.",".$tempCN.",".$tempGender.",".$tempPhrase.")'>Edit</button>
							    <button class='btn btn-warning   btn-xs'  	onclick='charDelete(".$result->characterId.",".$tempCN.",".$tempGender.",".$tempPhrase.")'>Delete</button>
							</td>
							
						</tr>";
			}
		}
	
		// Table insert row.
		echo "		<tr><form action = '' method = 'post'>
						<td><input type = 'text' name = 'id' placeHolder = '0001'></td>
						<td><input type = 'text' name = 'name' placeHolder = 'John'></td>
						<td><input type = 'text' name = 'gender' placeHolder = 'boy / girl'></td>
						<td><input type = 'text' name = 'phrase' placeHolder = 'John is a good boy.'></td>
						<td>
							<input class='btn btn-primary  btn-xs'type='submit' name='submitMode'  value='insert'></td>
						<td>
					</form></tr>";
		echo"</table></div>";
					
	
		

		
		// Get the submit data.
		if(isset($_POST[ "submitMode" ])) 
		{$submitMode	= $_POST[ "submitMode" ];
		switch ( $submitMode ) {
			// Insert data into database.
			case "insert" :
				$id			= $_POST[ "id" ];
				$name		= $_POST[ "name" ];
				$gender		= $_POST[ "gender" ];
				$phrase		= $_POST[ "phrase" ];
			
				$query = ( "INSERT INTO characterinfo VALUE(?, ?, ?, ?)" );
				$stmt = $db->prepare( $query );
				
				$stmt->bind_param( "ssss", $id, $name, $gender, $phrase );
				$stmt->execute();
				echo "<meta http-equiv='refresh' content='0;url=characterinfo_index.php'>"; 
				break;
			// Update data on database.
			case "update" :
				$id_old		= $_POST[ "id_old" ];
				$id_new		= $_POST[ "id_new" ];
				$name		= $_POST[ "name" ];
				$gender		= $_POST[ "gender" ];
				$phrase		= $_POST[ "phrase" ];
			
				$query = ( "UPDATE characterinfo SET characterId = ?, characterName = ?, gender = ?, phrase = ? WHERE characterId = ".$id_old );
				$stmt = $db->prepare( $query );
				$stmt->bind_param( "ssss", $id_new, $name, $gender, $phrase );
				$stmt->execute();
				break;
		}
		
	}
	
					
						
	?>
				
		
	</body>
</html>
