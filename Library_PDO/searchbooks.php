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
	    <h3 id="heading">search book</h3>
        <div id ="center">

            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">     
                  <label>Enter book name or keywords</label>
                  <input type="text" required name="name">
                  <button type="submit" name="submit">search now</button>
            </form>
            </div>
        <?php
          if(isset($_POST["submit"]))
          {
           $sql="SELECT * FROM book where btitle like '%{$_POST["name"]}%' or keywords like '%{$_POST["name"]}%'";
    
           $res=$con->prepare($sql);
           $res->execute();
           if ($res->rowCount() > 0) {
            echo "<table>
                    <tr>
                        <th>SNO</th>
                        <th>BOOK NAME</th>
                        <th>KEYWORD</th>
                        <th>VIEW</th>
                        <th>COMMENT</th>
                    </tr>";
            
            $i = 0;
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $i++;
                echo "<tr>";
                echo "<td>{$i}</td>";
                echo "<td>{$row["btitle"]}</td>";
                echo "<td>{$row["keywords"]}</td>";
                echo "<td><a href='{$row["file"]}' target='_blank'>view</a></td>";
                echo "<td><a href='comment.php?id={$row["bid"]}'>Go</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p class='error'>No books records found</p>";
        }
    } 
?>
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