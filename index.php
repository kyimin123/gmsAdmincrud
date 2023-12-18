<?php
session_start();
require "connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style type="text/css">
    body { 
        padding: 50px;
    }
    
</style>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                <div class="card">
                    <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-title">Admin List</div>
                        </div>
                        <div class="col-md-6">
                            <a href="create.php" class="btn btn-primary float-right">+Add new</a>
                        </div>
                        
                    </div>
                    <div class="card-body">
                        <?php if(isset($_SESSION['successmsg'])):?>        
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php
                        echo $_SESSION['successmsg'];
                        unset($_SESSION['successmsg']);
                        ?> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php endif ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User Name</th>
                            <th>Address</th>
                            <th>Contact_Info</th>
                            <th>Email</th>
                            <th>Full name</th>
                            <th>Role</th>
                            <th>Password</th>                            
                            <th>Action</th>
                            
                        </tr>  
                    </thead>   
                    <tbody>
                        <?php
                            $query = "SELECT * FROM admin";
                            $result = mysqli_query($con,$query);
                        
                            foreach($result as $row){
                        ?>
                        <tr>
                            <td><?php echo $row['AdminId'] ?></td>
                            <td><?php echo $row['Username'] ?></td>
                            <td><?php echo $row['Address'] ?></td>
                            <td><?php echo $row['Contact_info'] ?></td>
                            <td><?php echo $row['Email'] ?></td>
                            <td><?php echo $row['Fullname'] ?></td>
                            <td><?php echo $row['Role'] ?></td>
                            <td><?php echo $row['Password'] ?></td>
                            <td>
                                <a href="edit.php?AdminId=<?php echo $row['AdminId']; ?>">Edit</a>
                                <a href="delete.php?AdminId_to_Delete=<?php echo $row['AdminId']; ?>"
                                onclick="return confirm('Are you sure you want to delete?')">
                                Delete
                                </a>
                            </td>
                            
                        </tr>
                        <?php

                            } ?>
                        
                        
                    </tbody>
                </table>
                    </div>
                    <div class="card-footer">
                    <a href="logout.php" class="btn btn-primary float-right">Log Out</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php
if(isset($_GET['AdminId_to_Delete'])){
    $AdminID_to_delete = $_GET['AdminId_to_Delete'];
        $query = "DELETE FROM Admin WHERE AdminId = $AdminID_to_delete";
        mysqli_query($con,$query);
        $_SESSION['successmsg'] = "Deleted Successfully";
        header("location:index.php");
        exit();
        
}

?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>