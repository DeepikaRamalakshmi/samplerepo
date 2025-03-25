<?php
include "db.php";
session_start();
if(!isset($_SESSION["id"]))
{
    header("location:ulogin.php");
}
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
	    <h3 id="heading">welcome <?php echo $_SESSION["name"];?></h3>
    </div>
	</div>
	<div id="navi">
	    <?php
		   include  "usersidebar.php";
		?>
	</div>
	<div id="footer">
	   <p>Copyright &copy;library management 2019</p>
	</div>