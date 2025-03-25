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
	    <h3 id="heading">view student details</h3>
        <?php
           $sql="SELECT * FROM student";
           $res=$con->query($sql);
           if($res->num_rows>0){
                echo "<table>
                <tr>
                    <th>SNO</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>DEPARTMENT</th>
                </tr>";
                $i=0;
                while($row=$res->fetch_assoc())
                {
                    $i++;
                    echo "<tr>";
                    echo "<td>{$i}</td>";
                    echo "<td>{$row["name"]}</td>";
                    echo "<td>{$row["mail"]}</td>";
                    echo "<td>{$row["dep"]}</td>";
                    echo "</tr>";
                }
                echo "</table>";
           }else{
            echo "<p class='error'>No student records found</p>";
           }

        ?>
	     
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