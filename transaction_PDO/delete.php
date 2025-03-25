<?php
include 'connect.php';

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    
    try {

         // Start a transaction
         $con->begintransaction();

        // Delete from `student` table
        $sql = "DELETE FROM `student` WHERE id = $id";
        $res = $con->prepare($sql);
        $res->execute();       

        // Delete from `address` table
        $sql = "DELETE FROM `address` WHERE stu_id = $id";
        $res = $con->prepare($sql);
        $res->execute();
        // Commit the transaction
        $con->commit();

        // Redirect to the display page after successful delete
        header('location:display.php');

    } catch (Exception $e) {
        // Rollback the transaction if there is any error
        $con->rollback();
        echo "Error: " . $e->getMessage();
    }
}
?>
