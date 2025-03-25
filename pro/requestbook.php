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
	    <h3 id="heading">New book request</h3>
        <div id ="center">

        <?php
           if(isset($_POST["submit"]))
           {
               $sql="insert into request (id,mes,logs) values('{$_SESSION["id"]})','{$_POST["msg"]}',now())";
               $res=$con->query($sql);
                echo "<p class='success'>request send to admin</p>";
           }
            ?>
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">     
                  <label>Message</label>
                  <textarea required name="msg"></textarea>
                  <button type="submit" name="submit">send message</button>
            </form>
</div>
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