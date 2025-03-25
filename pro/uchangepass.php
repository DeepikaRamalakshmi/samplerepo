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
	    <h3 id="heading">change password</h3>
        <div id ="center">

        <?php
        if (isset($_POST["submit"])) {
        $sql = "SELECT * FROM student WHERE password = :opass AND id = :id";
        $res = $con->prepare($sql);
        $res->execute([
            ':opass' => $_POST["opass"],
            ':id' => $_SESSION["id"]
        ]);

        if ($res->rowCount() > 0) {
            $sql = "UPDATE student SET password = :npass WHERE id = :id";
            $res = $con->prepare($sql);
            $res->execute([
                ':npass' => $_POST["npass"],
                ':id' => $_SESSION["id"]
            ]);

            echo "<p class='success'>Password changed successfully</p>";
        } else {
            echo "<p class='error'>Invalid password</p>";
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
		   include  "usersidebar.php";
		?>
	</div>
	<div id="footer">
	   <p>Copyright &copy;library management 2019</p>
	</div>