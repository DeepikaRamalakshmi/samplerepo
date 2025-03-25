<?php
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
	    <h3 id="heading">New user registration</h3>
        <div id ="center">

        <?php
           if(isset($_POST["submit"]))
           {
            
                $sql="insert into student(name,password,mail,dep) values('{$_POST["name"]}','{$_POST["pass"]}','{$_POST["mail"]}','{$_POST["dep"]}')";
                $con->query($sql);
                echo "<p class='success'>user registration success</p>";

            }
            ?>

            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">     
                  <label>Name</label>
                  <input type="text" name="name" required>
                  <label>Password</label>
                  <input type="password" name="pass" required>
                  <label>Email id</label>
                  <input type="email" name="mail" required>
                  <select name="dep" requried>
                    <option value="">select</option>
                    <option value="BCA">BCA</option>
                    <option value="BA">BA</option>
                    <option value="BE">BE</option>
                    <option value="BSC">BSC</option>
                    <option value="BCOM">BCOM</option>

                </select>
                  <button type="submit" name="submit">Register now</button>
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