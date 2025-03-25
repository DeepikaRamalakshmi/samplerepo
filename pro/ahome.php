<?php
include "db.php"; 
session_start();

function countRecord($sql, $con)
{
        $res = $con->prepare($sql); 
        $res->execute();
        return $res->rowCount(); 
    } 

if (!isset($_SESSION["aid"])) {
    header("location:alogin.php");
    exit();
}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>library</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div id="container">
  <div id="header">
     <h1>E-Library Management System</h1>
	<div id="wrapper">
	    <h3 id="heading">Welcome Admin</h3>

	     <div id="center">
            <ul class="record">
                <li>Total students: <?php echo countRecord("SELECT * FROM student", $con); ?></li>
                <li>Total books: <?php echo countRecord("SELECT * FROM book", $con); ?></li>
                <li>Total requests: <?php echo countRecord("SELECT * FROM request", $con); ?></li>
                <li>Total comments: <?php echo countRecord("SELECT * FROM comment", $con); ?></li>
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
	   <p>Copyright &copy; Library Management 2019</p>
	</div>
</div>
</body>
</html>
