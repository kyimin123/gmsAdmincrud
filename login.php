<?php
session_start();
$message = "";
if(count($_POST)>0){
    $con =mysqli_connect("localhost","root","","gms");
    $result = mysqli_query($con,"SELECT * FROM admin
    WHERE Username = '".$_POST["name"]."' and Password = 
    '".$_POST["Password"]."'");
    $row = mysqli_fetch_array($result);
    if(is_array($row)){
        $_SESSION["Name"] = $row['Name'];
        $_SESSION["Password"] = $row['Password'];
    }else {
        $message = "Invalid Username or Password";
    }
}
if(isset($_SESSION["Password"])){
    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIN Form</title>
    
    <style>
    body {
    background-image: 
    url('https://images.unsplash.com/photo-1571985716526-adb8e16633da?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1yZWxhdGVkfDEzfHx8ZW58MHx8fHx8');
}
    
</style> 
</head>

<body>
    <h1 style="text-align: center;" class="hello">Garbage Management System</h1>
   
<form action="" method="post">
    <div class="message">
    <?php 
    if($message!==""){echo $message; }
    ?>
    </div>
<table style="margin-left: 450px;">
<tr><td> UserName:</td>
<td>  <input type="text" name="name"></td></tr>
<tr><td>Password:</td>
        <td><input type="Password" name="Password"></td>
    </tr>
<tr> <td>     <input type="submit" value="Log In"></td></tr></table>
</form>


 </body>
</html>

