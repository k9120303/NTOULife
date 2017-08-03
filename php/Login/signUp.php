  <?php
      $localhost ='localhost';
	  $user = 'root';
	  $password='team21project';
	  $database='team21project';

	  //向sql伺服端連線
	
	  $db=new mysqli("localhost","root","team21project","team21project");
	  //reference from http://php.net/manual/en/function.mysql-connect.php
	                 //http://php.net/manual/en/mysqlinfo.api.choosing.php 
      if(!$db)
	  {
		  print "Connnect failed:".mysqli_connect_error();
		 //  echo "Connnect failed:".mysqli_connect_error();
		 exit();
	  }
	  mysqli_set_charset($db,"utf8");//設定編碼
	  mysqli_select_db($db,"team21project");
	  ?>