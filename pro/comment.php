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
	    <h3 id="heading">send your comment.</h3>
             <?php
             if(isset($_POST["submit"]))
             {
              
                  $sql="insert into comment (bid,sid,comm,logs) values({$_GET["id"]},{$_SESSION["id"]},'{$_POST["mes"]}',now())" ;
                  $con->query($sql);
             }
               $sql="select * from book where bid=".$_GET["id"];
               $res=$con->query($sql);
               if($res->num_rows>0)
               {
                   echo "<table>";
                   $row=$res->fetch_assoc();
                   echo "<tr>
                   <th>Book name</th>
                   <td>{$row["btitle"]}</td>
                   </tr>
                   <tr>
                   <th>Keywords</th>
                   <td>{$row["keywords"]}</td>
                   </tr>";
                   echo "</table>";
               }
               else{
                echo "<p class='error'>No books found</p>";
               }
               ?>
        <div id ="center">
            <form action="<?php echo $_SERVER["REQUEST_URI"]?>" method="post">
                <label>your comments</label>
                <textarea name="mes" requried></textarea>
                <button type="submit" name="submit">post now</button>
            </form>
        </div>
        <?php
            $sql="select student.name,comment.comm,comment.logs from comment inner join student on comment.sid=student.id where comment.bid={$_GET["id"]} order by comment.cid desc";
            $res=$con->query($sql);
            if($res->num_rows>0){
                 while($row=$res->fetch_assoc())
                 {
                    echo "<p>
                    <strong>{$row["name"]} : </strong>
                    {$row["comm"]}
                    <i>{$row["logs"]}</i>
                    </p>";
                 }
            }
            else{
                echo "<p class='error'>no comment yet...</p>";
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