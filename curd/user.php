<?php
include 'connect.php';
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    
    $sql="insert into `curd` (name,mobile,email,password)
    values('$name','$mobile','$email','$password')";
    $result = mysqli_query($con,$sql);
    if ($result){
         header('location:display.php') ;
    }else{
        die(mysqli_error($con));
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
            <input type="text" name="name" placeholder="Enter name"class="form-control" autocomplete="off">
        </div>
        <div class="form-group mt-3">
            <label>mobile no</label>
            <input type="text" name="mobile" placeholder="Enter no" class="form-control" autocomplete="off">
        </div>
        <div class="form-group mt-3">
            <label>email</label>
            <input type="email" name="email" placeholder="Enter Email" class="form-control" autocomplete="off">
        </div>
        <div class="form-group mt-3">
            <label>password</label>
            <input type="text" name="password" placeholder="Enter password" class="form-control" autocomplete="off">
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
</div>
</body>
</html>