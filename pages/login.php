<?php session_start(); 
include_once('../config/config.php');
// Code for login 
if(isset($_POST['login']))
{
$password=$_POST['password'];
$dec_password=$password;
    $useremail=$_POST['uemail'];
    $ret= mysqli_query($con,"SELECT * FROM traveluser WHERE UserName='$useremail' and Pass='$dec_password'");
$num=mysqli_fetch_array($ret);
if($num>0)
{

$_SESSION['UID']=$num['UID'];
$_SESSION['UserName']=$num['UserName'];
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$fav=array();
$_SESSION['fav'] = $fav;

header("location:../index.php");

}
else
{
echo "<script>alert('Invalid username or password');</script>";
}
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>User Login | Registration and Login System</title>
        <link href="../public/css/styles.css" rel="stylesheet" />
        <link href="../public/css/bootstrap.min.css" rel="stylesheet">
      
    </head>
    <body class="">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">User Login</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="uemail" type="email" placeholder="name@example.com" required/>
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="password" type="password" placeholder="Password" required />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="signup.php" style="color: #f33f3f;">Create New Account</a>
                                                <a class="small" href="password-recovery.php" style="color: #f33f3f;">Forgot Password?</a>
                                                <button class="btn btn-primary" style="background-color: #f33f3f;" name="login" type="submit">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
