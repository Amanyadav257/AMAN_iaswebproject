<?php 
include('../includes/connect.php');

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
      <!-----------------------------------------------------------------Bootstrap css link --------------------------------------------------->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        body{
            overflow-x: hidden;
        }
    </style>

</head>
<body>
    
    <div class="container-fluid my-3">
        <h2 class="text-center">Admin Login</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">

                    <!-------------------------------------------------------------------- Username field ------------------------------------->
                        <div class="form-outline mb-4">
                            <label for="user_name" class="form-label">Admin Name<span class="text-danger">*</span></label>
                            <input type="text" id="user_name" class="form-control " placeholder="Enter your Username" 
                            autocomplete="off" required="required" name="user_name">
                        </div>

                         <!--------------------------------------------------------------------Password field ----------------------------------->
                         <div class="form-outline mb-4">
                            <label for="user_password" class="form-label">Password<span class="text-danger">*</label>
                            <input type="password" id="user_password" class="form-control " placeholder="Enter your Password" 
                            autocomplete="off" required="required" name="user_password">
                        </div>


                        <div>
                            <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="user_login">
                        </div>
                        
                        <P class="small fw-bold mt-3 pt-2 mb-0">Don't have an account? <a href="./admin_registration.php" class="text-danger">SignUp</a></P>
                </form>
            </div>
        </div>
    </div>

</body>
</html>

<?php
    global $con;
if(isset($_POST['user_login'])){
    $user_names=$_POST['user_name'];
    $user_password=$_POST['user_password'];
    
    $select_query="Select * from `admin_table` where user_name='$user_names' ";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    // $user_ip=getIPAddress();


    if($row_count > 0){
        $_SESSION['username']=$user_names;
        if(password_verify($user_password,$row_data['user_password'])){

            if($row_count == 1){
                $_SESSION['username']=$user_names;
            echo "<script>alert('Login Seccessfully')</script>";
            echo "<script>window.open('./index.php','_self')</script>";
            }
        }else{
            echo "<script>alert('Invalid password')</script>";
        }
    }else{
        "<script>alert('Invalid Username')</script>";
    }
}

?>