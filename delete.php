<?php
require('connect.php');
if(isset($_GET['AdminId_to_Delete'])){
    $AdminID_to_delete = $_GET['AdminId_to_Delete'];
        $query = "DELETE FROM Admin WHERE AdminId = $AdminID_to_delete";
        mysqli_query($con,$query);
        $_SESSION['successmsg'] = "Deleted Successfully";
        header("location:index.php");
        exit();
        
}