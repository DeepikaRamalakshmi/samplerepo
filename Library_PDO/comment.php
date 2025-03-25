<?php
include "db.php";
session_start();
if (!isset($_SESSION["id"])) {
    header("location:ulogin.php");
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>library</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div id="container">
    <div id="header">
        <h1>E-Library Management System</h1>
    </div>
    <div id="wrapper">
        <h3 id="heading">Send your comment.</h3>
        <?php
        if (isset($_POST["submit"])) {
                $sql = "INSERT INTO comment (bid, sid, comm, logs) VALUES (:bid, :sid, :comm, NOW())";
                $res = $con->prepare($sql);
                $res->execute([
                    ':bid' => $_GET["id"],
                    ':sid' => $_SESSION["id"],
                    ':comm' => $_POST["mes"]
                ]);
            }

            $sql = "SELECT * FROM book WHERE bid = :bid";
            $res = $con->prepare($sql);
            $res->execute([':bid' => $_GET["id"]]);

            if ($res->rowCount() > 0) {
                echo "<table>";
                $row = $res->fetch(PDO::FETCH_ASSOC);
                echo "<tr>
                        <th>Book name</th>
                        <td>{$row["btitle"]}</td>
                      </tr>
                      <tr>
                        <th>Keywords</th>
                        <td>{$row["keywords"]}</td>
                      </tr>";
                echo "</table>";
            } else {
                echo "<p class='error'>No books found</p>";
            }
        ?>
        <div id="center">
            <form action="<?php echo $_SERVER["REQUEST_URI"] ?>" method="post">
                <label>Your comments</label>
                <textarea name="mes" required></textarea>
                <button type="submit" name="submit">Post now</button>
            </form>
        </div>

        <?php
            $sql = "SELECT student.name, comment.comm, comment.logs 
                    FROM comment INNER JOIN student ON comment.sid = student.id WHERE comment.bid = :bid ORDER BY comment.cid DESC";
            $res = $con->prepare($sql);
            $res->execute([':bid' => $_GET["id"]]);

            if ($res->rowCount() > 0) {
                while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                    echo "<p>
                            <strong>{$row["name"]} : </strong>
                            {$row["comm"]}
                            <i>{$row["logs"]}</i>
                          </p>";
                }
            } else {
                echo "<p class='error'>No comments yet...</p>";
            }
        ?>
        
    </div>
    <div id="navi">
        <?php include "usersidebar.php"; ?>
    </div>
    <div id="footer">
        <p>Copyright &copy; library management 2019</p>
    </div>
</div>
</body>
</html>
