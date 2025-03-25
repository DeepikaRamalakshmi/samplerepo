<?php
include "db.php";
session_start();
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
	    <h3 id="heading">change password</h3>
        <div id ="center">

        <?php
           if(isset($_POST["submit"]))
           {
               $sql="select * from admin where apass='{$_POST["opass"]}' and aid='{$_SESSION["aid"]}'";
               $res=$con->query($sql);

               if($res->num_rows>0){
                $sql="update admin set apass='{$_POST["npass"]}' where aid=".$_SESSION["aid"];
                $con->query($sql);
                echo "<p class='success'>password changed success</p>";
               }
               else{
                echo "<p class='error'>invalid password</p>";

               }
            }
            ?>
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">     
                  <label>oldpassword</label>
                  <input type="password" name="opass" required>
                  <label>newpassword</label>
                  <input type="password" name="npass" required>
                  <button type="submit" name="submit">update password</button>
            </form>
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