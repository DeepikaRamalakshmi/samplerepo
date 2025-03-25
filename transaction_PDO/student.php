<?php
include 'connect.php';
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $age=$_POST['age'];
    $mobileno=$_POST['mobileno'];
    $street=$_POST['street'];
    $city=$_POST['city'];
    
    // this method to use in pdo
    $con->begintransaction();
    try{
    $sql="insert into `student` (name,age,mobileno)
    values('$name','$age','$mobileno')";
    $res = $con->prepare($sql);
    $res->execute();

    // Get the last inserted student ID in pdo
    $stu_id=$con->lastinsertid();

    $sql="insert into `address` (stu_id,street,city)
    values('$stu_id','$street','$city')";
    $res = $con->prepare($sql);
    $res->execute();   
   
    $con->commit();
    header('location:display.php') ;
}
    catch(Exception $e){
        $con->rollback();
        echo $e->getMessage();

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>transaction</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container my-5">
    <form method="post">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" placeholder="Enter name"class="form-control" autocomplete="off">
        </div>
        <div class="form-group mt-3">
            <label>age</label>
            <input type="text" name="age" placeholder="Enter age" class="form-control" autocomplete="off" required maxlength="10">
            </div>
        <div class="form-group mt-3">
            <label>mobile no</label>
            <input type="text" name="mobileno" placeholder="Enter no" class="form-control" autocomplete="off">
        </div>
        <div class="form-group mt-3">
            <label>street</label>
            <input type="text" name="street" placeholder="Enter street" class="form-control" autocomplete="off">
        </div>
        
        <div class="form-group mt-3">
            <label>city</label>
            <input type="text" name="city" placeholder="Enter city" class="form-control" autocomplete="off">
        </div>
       
        <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
</div>
</body>
</html>