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
	    <h3 id="heading">view request details</h3>
        <?php
           $sql="Select student.name,request.mes,request.logs from student inner join request on student.id=request.id";
           $res=$con->query($sql);
           if($res->num_rows>0){
                echo "<table>
                <tr>
                    <th>SNO</th>
                    <th>NAME</th>
                    <th>MESSAGE</th>
                    <th>LOGS</th>
                </tr>";
                $i=0;
                while($row=$res->fetch_assoc())
                {
                    $i++;
                    echo "<tr>";
                    echo "<td>{$i}</td>";
                    echo "<td>{$row["name"]}</td>";
                    echo "<td>{$row["mes"]}</td>";
                    echo "<td>{$row["logs"]}</td>";
                    echo "</tr>";
                }
                echo "</table>";
           }else{
            echo "<p class='error'>No request records found</p>";
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