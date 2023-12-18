<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style type="text/css">
    body { 
        padding: 50px;
    }
    
</style>

<body>
<?php
require "connect.php";
    $username_error = '';
    $address_error = '';
    $contact_info_error = '';
    $email_error = '';
    $fullname_error = '';
    $role_error = '';
    $password_error = '';
if(isset($_POST['create'])){
   $username = $_POST['username'];
   $address = $_POST['address'];
   $contact_info=$_POST['contact_info'];
   $email=$_POST['email'];
   $fullname=$_POST['fullname'];
   $role=$_POST['role'];
   $password=$_POST['password'];
   if($username==''){
    $username_error = "This fields is required";
   }
   if($address==''){
    $address_error = "This fields is required";
   }
   if($contact_info==''){
    $contact_info_error = "This fields is required";
   }
   if($email==''){
    $email_error = "This fields is required";
   }
   if($fullname==''){
    $fullname_error = "This fields is required";
   }
   if($role==''){
    $role_error = "This fields is required";
   }
   if($password==''){
    $password_error = "This fields is required";
   }
   
   if($username!=''&& $address!='' && $contact_info!= '' && $email != '' && $fullname!='' && $role!= '' && $password!=''){
    $query= "INSERT INTO admin(Username,Address,Contact_info,Email,Fullname,Role,Password) 
   VALUES('$username','$address','$contact_info','$email','$fullname','$role','$password')";
   mysqli_query($con,$query);
   $_SESSION['successmsg'] = "Created Successfully";
   header('location:index.php');
   }
}
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                <div class="card">
                    <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-title">Register Form</div>
                        </div>
                        <div class="col-md-6">
                            <a href="index.php" class="btn btn-secondary float-right"> << Back</a>
                        </div>
                        
                    </div>
                    <form action="create.php" method="post">
                    <div class="card-body">
                        
                            <div class="form-group">
                                <label for="">User Name</label>
                                <input type="text" name="username" 
                                class="form-control <?php if($username_error !=''):?>is-invalid  <?php endif ?>"
                                placeholder="Enter name">
                                <span class="text-danger"><?php echo $username_error ?></span>
                            </div>

                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" name="address" 
                                class="form-control <?php if($address_error !=''):?>is-invalid  <?php endif ?>" placeholder="Enter Address">
                                <span class="text-danger"><?php echo $address_error ?></span>

                            </div>

                            <div class="form-group">
                                <label for="">Contact_Info</label>
                                <input type="text" name="contact_info" 
                                class="form-control <?php if($contact_info_error !=''):?>is-invalid  <?php endif ?>" placeholder="Contact_info.....">
                                <span class="text-danger"><?php echo $contact_info_error ?></span>
                                
                            </div>

                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" 
                                class="form-control <?php if($email_error !=''):?>is-invalid  <?php endif ?>" placeholder="Enter email">
                                <span class="text-danger"><?php echo $email_error ?></span>
                            </div>

                            <div class="form-group">
                                <label for="">FullName</label>
                                <input type="text" name="fullname" 
                                class="form-control <?php if($fullname_error !=''):?>is-invalid  <?php endif ?>" placeholder="Enter fullname">
                                <span class="text-danger"><?php echo $fullname_error ?></span>
                            </div>

                            <div class="form-group">
                                <label for="">Role</label>
                                <input type="text" name="role" 
                                class="form-control <?php if($role_error !=''):?>is-invalid  <?php endif ?>" placeholder="Enter Role">
                                <span class="text-danger"><?php echo $role_error ?></span>
                            </div>

                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" 
                                class="form-control <?php if($password_error !=''):?>is-invalid  <?php endif ?>" placeholder="Enter password">
                                <span class="text-danger"><?php echo $password_error ?></span>
                            </div>                       
                    </div>

                        <div class="card-footer">
                            <button type="submit" name="create" class="btn btn-primary">Create</button>
                        </div>
                        </form>

                </div>
            </div>
        </div>
    </div>
    
    






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>