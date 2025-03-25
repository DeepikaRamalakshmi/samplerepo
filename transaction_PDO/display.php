<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <button class="btn btn-primary my-5"><a href="student.php" 
        class="text-light">Add student</a>
    </button>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Name</th>
      <th scope="col">Age</th>
      <th scope="col">Mobile</th>
      <th scope="col">Street</th>
      <th scope="col">City</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>


<?php
try {
    // SELECT query to fetch data
    $sql = "SELECT 
                student.id AS id,
                student.name AS name,
                student.age AS age,
                student.mobileno AS mobileno,
                address.street AS street,
                address.city AS city FROM student
            INNER JOIN address ON student.id = address.stu_id;";

    $res = $con->prepare($sql);

// Execute the query
    $res->execute();


    // Display data in the table
    while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
        $id = $row['id'];
        $name = $row['name'];
        $age = $row['age']; 
        $mobileno = $row['mobileno'];
        $street = $row['street'];
        $city = $row['city'];
        echo '<tr>
            <th scope="row">' . $id . '</th>
            <td>' . $name . '</td>
            <td>' . $age . '</td>
            <td>' . $mobileno . '</td>
            <td>' . $street . '</td>
            <td>' . $city . '</td>
            <td>
        
        
        <button class="btn btn-primary"><a href="update.php?updateid=' . $id . '" class="text-light">Update</a></button>
        <button class="btn btn-danger"><a href="delete.php?deleteid=' . $id . '" class="text-light">Delete</a></button>
            </td>
        </tr>';
    }

} catch (Exception $e) {
    echo "Transaction failed: " . $e->getMessage();
}

?>

</tbody>
</table>
    </div>
</body>
</html>