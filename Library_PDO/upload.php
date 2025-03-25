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
	    <h3 id="heading">upload new books</h3>
        <div id ="center">

        <?php
           if(isset($_POST["submit"]))
           {
            $target_dir="upload/";
            $target_file=$target_dir.basename($_FILES["efile"]["name"]);
            if(move_uploaded_file($_FILES["efile"]["tmp_name"],$target_file)){
                $sql="insert into book(btitle,keywords,file) values('{$_POST["bname"]}','{$_POST["keys"]}','{$target_file}')";
                $con->query($sql);
                echo "<p class='success'>Books uploaded</p>";

            }else{
                echo "<p class='error'>Error in upload</p>";
            }
            }
            ?>
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data">     
                  <label>Book title</label>
                  <input type="text" name="bname" required>
                  <label>Keywords</label>
                  <textarea name="keys" required></textarea>
                  <label>upload file</label>
                  <input type="file" name="efile" requried >
                  <button type="submit" name="submit">upload Book</button>
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