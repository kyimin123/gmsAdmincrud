<?php
session_start();
require 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edition Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style type="text/css">
    body { 
        padding: 50px;
    }
    
</style>

<body>
    <?php
    if(isset($_GET['AdminId'])){
        $adminId_to_upd = $_GET['AdminId'];
        $update = mysqli_query($con,"SELECT * FROM admin WHERE AdminId=$adminId_to_upd");
        if(mysqli_num_rows($update)==1){
            foreach($update as $row){
                $AdminId = $row["AdminId"];
                $upd_username = $row["Username"];
                $upd_address = $row["Address"];
                $upd_contact = $row["Contact_info"];
                $upd_email = $row["Email"];
                $upd_fullname = $row["Fullname"];
                $upd_role = $row["Role"];
                $upd_psw = $row["Password"];            
 
            }
        }
    }
        $username_error = '';
        $address_error = '';
        $contact_info_error = '';
        $email_error = '';
        $fullname_error = '';
        $role_error = '';
        $password_error = '';
    

    if(isset($_POST['update'])){
        
        $id = $_POST["AdminId"];
        $upd_username = $_POST['username'];
        $upd_address = $_POST["address"];
        $upd_contact = $_POST["contact_info"];
        $upd_email = $_POST["email"];
        $upd_fullname = $_POST["fullname"];
        $upd_role = $_POST["role"];
        $upd_psw = $_POST["password"];
        if(empty($upd_username)){
            $username_error = "This fields is required";
        }
        if(empty($upd_address)){
            $address_error = "This fields is required";
        }
        if(empty($upd_contact)){
            $contact_info_error = "This fields is required";
        }
        if(empty($upd_email)){
            $email_error = "This fields is required";
        }
        if(empty($upd_fullname)){
            $fullname_error = "This fields is required";
        }
        if(empty($upd_role)){
            $role_error = "This fields is required";
        }
        if(empty($upd_psw)){
            $password_error = "This fields is required";
        }
        if($upd_username!=''&& $upd_address!='' && $upd_contact!= '' && $upd_email != '' && $upd_fullname!='' && $upd_role!= '' && $upd_psw!='')
           {
        $query =  "UPDATE Admin SET Username = '$upd_username', Address='$upd_address',
                Contact_info = '$upd_contact',Email = '$upd_email', Fullname = '$upd_fullname', Role = '$upd_role',
                Password = '$upd_psw'
                WHERE AdminId = $id";
        mysqli_query($con,$query);
        $_SESSION['successmsg'] = 'update Successfully';
        header('location:index.php');
        
           };
        
        }
    
    

    
    
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                <div class="card">
                    <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-title">Edition Form</div>
                        </div>
                        <div class="col-md-6">
                            <a href="index.php" class="btn btn-secondary float-right"> << Back</a>
                        </div>
                        
                    </div>
                    <form action="" method="post">
                    <div class="card-body">
                        <input type="hidden" name="AdminId" value="<?php echo $AdminId ?>">
                            <div class="form-group">
                                <label for="">User Name</label>
                                <input type="text" name="username" 
                                class="form-control <?php if($username_error !=''):?>is-invalid  <?php endif ?>"
                                placeholder="Enter name" value="<?php echo $upd_username ?>"> 
                                <span class="text-danger"><?php echo $username_error ?></span>
                            </div>

                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" name="address" 
                                class="form-control <?php if($address_error !=''):?>is-invalid  <?php endif ?>" 
                                placeholder="Enter Address" value="<?php echo $upd_address ?>">
                                <span class="text-danger"><?php echo $address_error ?></span>

                            </div>

                            <div class="form-group">
                                <label for="">Contact_Info</label>
                                <input type="text" name="contact_info" 
                                class="form-control <?php if($contact_info_error !=''):?>is-invalid  <?php endif ?>" 
                                placeholder="Contact_info....."value="<?php echo $upd_contact ?>">
                                <span class="text-danger"><?php echo $contact_info_error ?></span>
                                
                            </div>

                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" 
                                class="form-control <?php if($email_error !=''):?>is-invalid  <?php endif ?>" 
                                placeholder="Enter email" value="<?php echo $upd_email ?>">
                                <span class="text-danger"><?php echo $email_error ?></span>
                            </div>

                            <div class="form-group">
                                <label for="">FullName</label>
                                <input type="text" name="fullname" 
                                class="form-control <?php if($fullname_error !=''):?>is-invalid  <?php endif ?>" 
                                placeholder="Enter fullname" value="<?php echo $upd_fullname ?>">
                                <span class="text-danger"><?php echo $fullname_error ?></span>
                            </div>

                            <div class="form-group">
                                <label for="">Role</label>
                                <input type="text" name="role" 
                                class="form-control <?php if($role_error !=''):?>is-invalid  <?php endif ?>" 
                                placeholder="Enter Role" value="<?php echo $upd_role ?>">
                                <span class="text-danger"><?php echo $role_error ?></span>
                            </div>

                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" 
                                class="form-control <?php if($password_error !=''):?>is-invalid  <?php endif ?>" 
                                placeholder="Enter password" value="<?php echo $upd_psw ?>">
                                <span class="text-danger"><?php echo $password_error ?></span>
                            </div>                       
                    </div>

                        <div class="card-footer">
                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                        </div>
                        </form>

                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>