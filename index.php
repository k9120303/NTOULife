 <!DOCTYPE html>  
<html>
 <head>
 <meta charset="utf-8"/>
 
<!-- <meta http-equiv="Content-Type" content="text/html" charset="utf8">-->
 <link rel="stylesheet" type="text/css" href="css/theme.css">
 <link rel="stylesheet" type="text/css" href="css/superhero.css">
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>



 <title>DB 21組 期末專案</title>
 </head>
 <!------------------------------------>
  <body class="home">
  <head class="container">	
	  <div class="navbar navbar-default">
		  <div class="navbar-header">
		  <a class="navbar-brand" href="index.html">海大人生</a>
		  </div>
			<ul class="nav navbar-nav">
			  <li><a>功能</a></li>
			  <li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">表單<span class="caret"></span></a>
				  <ul class="dropdown-menu" role="menu">
				  <li><a href="php/player.php">Player Table</a></li>
				  <li class="divider"></li>
				  <li><a href="php/place.php">Place Table</a></li>
				  <li class="divider"></li>
				  <li><a href="php/item.php">Item Table</a></li>
				  <li class="divider"></li>
				  <li><a href="php/itemBag.php">Item Bag Table</a></li>
				  <li class="divider"></li>
				  <li><a href="php/characterinfo.php">Character Table</a></li>
				  <li class="divider"></li>
				  <li><a href="php/gamer.php">gamer Table</a></li>
				  </ul>
			  </li>
			</ul>
			 
			 <form class="navbar-form navbar-right" role="search">
				<div class="form-group">
				   <input type="text" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			 </form>   
			 <div class="navbar-form navbar-right ">
				<div class="btn-group">
				<a href="/php/login/signUp.php" class="btn btn-warning">Sign Up</a>
				</div>
			    <div class="btn-group dropdown 	">
				<button type="button"class="btn dropdown-toggle btn-warning "data-toggle="dropdown"aria-expanded="true">Login</button>
					<ul class="dropdown-menu dropdown-menu-right dropdown-animation">
						<li><form class="login-form margin-clear">
							 <div class="form-group has-feedback">
								<label class="control-label">UserName</label>
								<input type="text" class="form-control"name="UserName">
							 </div>
							 <div class="form-group has-feedback">
								<label class="control-label">PassWord</label>
								<input type="text" class="form-control"name="PassWord">
							 </div>
							 <button type="submit"class="btn btn-success btn-sm"value="Login">Login</button>
							<span class="pl-5 pr-5">Or</span>
							 <button type="submit"class="btn btn-info btn-sm"value="SignUp">Sign UP</button>
							</form>
						</li>
					</ul>
				</div>
			 </div>
	  </div>
</head>
  

	<div class="container">
	  <div class="jumbotron">
		<h1>海大人生</h1>      
		<p>第21組資料庫期末專題</p>
	  </div>
	 
	</div>


</body>
</html>
<!--
<div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
-->