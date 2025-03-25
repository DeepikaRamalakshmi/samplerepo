<?php
include "db.php";
session_start();
function countRecord($sql,$con)
{
    $res=$con->query($sql);
    return $res->num_rows;
}
if(!isset($_SESSION["aid"]))
{
    header("location:alogin.php");
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
	    <h3 id="heading">welcome Admin</h3>

	     <div id="center">
            <ul class="record">
                <li>total student : <?php echo countRecord("select * from student",$con);?></li>
                <li>total Book : <?php echo countRecord("select * from book",$con);?></li>
                <li>total request : <?php echo countRecord("select * from request",$con);?></li>
                <li>total comments : <?php echo countRecord("select * from comment",$con);?></li>
            </ul>
          </div>
	</div>
	</div>
	<div id="navi">
	    <?php
		   include  "adminsidebar.php";
		?>
	</div>
	<div id="footer">
	   <p>Copyright &copy;library management 2019</p>
	</div>