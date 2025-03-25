<?php
session_start();
include "db.php";
?>
<!DOCTYPE HTML>
<html>
<head>
<title>library</title>
<link rel="stylesheet"type="text/css" href="css/style.css">
</head>
<body>
<div id="container">
  <div id="header">
     <h1>E-Library Management System</h1>
	<div id="wrapper">
	<h3 id="heading">Admin Login here</h3>

	<div id="center">
	<?php
         if(isset($_POST["submit"])){
			$sql="SELECT * FROM admin where aname='{$_POST["name"]}' and apass='{$_POST["password"]}'";
			$res=$con->prepare($sql);
			$res->execute(); 
	        if ($res->rowCount() > 0) {
				$row = $res->fetch(PDO::FETCH_ASSOC); 
				$_SESSION["aid"] = $row["aid"];     
				$_SESSION["aname"] = $row["aname"];  
				header("location:ahome.php");                               
			}
			
			else{
				echo "<p class='error'>invalid user details</p>";
			}
         }
    ?>

	<form action="alogin.php" method="post">
	   <label>Name</label>
	   <input type="text" name="name" required>
	   
	   <label>password</label>
	   <input type="password" name="password" required>
	   
	   <button type="submit" name="submit">Login</button>
	   </form>
	   </div>
	   </div>
	</div>
	<div id="navi">
	    <?php
		   include  "sidebar.php";
		?>
	</div>
	<div id="footer">
	   <p>Copyright &copy;library management 2019</p>
	</div>