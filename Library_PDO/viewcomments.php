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
	    <h3 id="heading">view comment details</h3>

        <?php
          $sql = "SELECT book.btitle, student.name, comment.comm, comment.logs 
        FROM comment INNER JOIN book ON book.bid = comment.bid INNER JOIN student ON comment.sid = student.id";
         $res = $con->prepare($sql); 
         $res->execute(); 

      if ($res->rowCount() > 0) {
         echo "<table>
            <tr>
                <th>SNO</th>
                <th>BOOK</th>
                <th>NAME</th>
                <th>COMMENT</th>
                <th>LOGS</th>
            </tr>";

    $i = 0;
    while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
        $i++;
        echo "<tr>";
        echo "<td>{$i}</td>";
        echo "<td>{$row['btitle']}</td>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['comm']}</td>";
        echo "<td>{$row['logs']}</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p class='error'>No comments records found</p>";
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