<?php
include 'connect.php';
$id = $_GET['updateid'];

// Fetch the current data from both `student` and `address` tables
$sql = "SELECT 
            student.id AS id, 
            student.name AS name, 
            student.age AS age, 
            student.mobileno AS mobileno, 
            address.street AS street, 
            address.city AS city
        FROM  student 
        INNER JOIN address 
        ON student.id = address.stu_id 
        WHERE student.id = $id";

      $res = $con->prepare($sql);
      $res->execute();
      $row = $res->fetch(PDO::FETCH_ASSOC);
      $name = $row['name'];
      $age = $row['age'];
      $mobileno = $row['mobileno'];
      $street = $row['street'];
      $city = $row['city'];

// If the form is submitted
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $mobileno = $_POST['mobileno'];
    $street = $_POST['street'];
    $city = $_POST['city'];

    try {
        // Start the transaction
        $con->beginTransaction();
        // Update `student` table
        $sql = "UPDATE `student` SET name='$name', age='$age', mobileno='$mobileno' WHERE id=$id";
        $res = $con->prepare($sql);
        $res->execute();

        // Update `address` table
        $sql = "UPDATE `address` SET street='$street', city='$city' WHERE stu_id=$id";
        $res = $con->prepare($sql);
        $res->execute();
        // Commit the transaction
        $con->commit();

        // Redirect to display page after successful update
        header('location:display.php');
    } 
    catch (Exception $e) {
        // Rollback the transaction if there is any error
        $con->rollback();
        echo "Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curd operation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container my-5">
    <form method="post">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" placeholder="Enter name"class="form-control" autocomplete="off" value=<?php echo $name;?>>
        </div>
        <div class="form-group mt-3">
            <label>Age</label>
            <input type="text" name="age" placeholder="Enter age" class="form-control" autocomplete="off" value=<?php echo $age;?>>
        </div>
        <div class="form-group mt-3">
            <label>mobile no</label>
            <input type="text" name="mobileno" placeholder="Enter mobileno" class="form-control" autocomplete="off" value=<?php echo $mobileno;?>>
        </div>
        <div class="form-group mt-3">
            <label>Street</label>
            <input type="text" name="street" placeholder="Enter street" class="form-control" autocomplete="off" value=<?php echo $street;?>>
        </div>
        <div class="form-group mt-3">
            <label>City</label>
            <input type="text" name="city" placeholder="Enter city" class="form-control" autocomplete="off" value=<?php echo $city;?>>
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary mt-3">Update</button>
</body>
</html>