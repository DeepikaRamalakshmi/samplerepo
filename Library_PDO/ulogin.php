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
	<h3 id="heading">User Login here</h3>

	<div id="center">
	<?php
         if(isset($_POST["submit"])){
			$sql="SELECT * FROM student where name='{$_POST["name"]}' and password='{$_POST["pass"]}'";
			$res=$con->prepare($sql);
			$res->execute();
	        if ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $_SESSION["id"] = $row["id"];
                $_SESSION["name"] = $row["name"];
                header("location: uhome.php");
                exit;
            } else {
                echo "<p class='error'>Invalid user details</p>";
            }
        } 
    ?>

	<form action="ulogin.php" method="post">
	   <label>Name</label>
	   <input type="text" name="name" required>
	   
	   <label>password</label>
	   <input type="password" name="pass" required>
	   
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