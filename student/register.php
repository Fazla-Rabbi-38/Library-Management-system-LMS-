<?php

 require_once '../dbcon.php';

 session_start();
if (isset($_SESSION['student_login'])) {
     header('location: index.php');
 }


if (isset($_POST['student_register'])){
   # echo '<pre>'; 
    #print_r($_POST);
    #echo '</pre>';
    $full_name = $_POST['full_name'];
    $dept = $_POST['dept'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $roll_no = $_POST['roll_no'];
    $reg_no = $_POST['reg_no'];
    //$photo = $_POST['photo'];
    //$status = $_POST['status'];
    $phone = $_POST['phone'];


    $input_errors=array();

    if (empty($full_name)) {
        $input_errors['full_name']="Full Name is required!";}
    if (empty($dept)) {
        $input_errors['dept']="Dept is required!";}
    if (empty($email)) {
        $input_errors['email']="Email is required!";}
    if (empty($username)) {
        $input_errors['username']="Username is required!";}
    if (empty($password)) {
        $input_errors['password']="Password is required!";}
    if (empty($roll_no)) {
        $input_errors['roll_no']="Roll NO is required!";}
    if (empty($reg_no)) {
        $input_errors['reg_no']="Reg NO is required!";}
    if (empty($phone)) {
        $input_errors['phone']="Phone NO is required!";}


        print_r($input_errors);
        echo count($input_errors);

    if(count($input_errors) == 0){

    $email_check = mysqli_query($con, "SELECT * FROM students WHERE email = '$email'  ");
    $email_check_row = mysqli_num_rows($email_check);
    if($email_check_row == 0){
        $username_check = mysqli_query($con, "SELECT * FROM students WHERE username = '$username'  ");
    $username_check_row = mysqli_num_rows($username_check);

    if ($username_check_row == 0) {
       $reg_no_check = mysqli_query($con, "SELECT * FROM students WHERE reg_no = '$reg_no'  ");
$reg_no_check_row = mysqli_num_rows($reg_no_check); 
    if ($reg_no_check_row == 0) {
        if(strlen($username)>4){
            if (strlen($password)>4) {
                //$password_hash = password_hash($password, PASSWORD_DEFAULT);
     $sql="INSERT INTO students(full_name, dept,email,username, password, roll_no, reg_no,photo,status,phone)
    VALUES ('$full_name','$dept','$email','$username','$password','$roll_no','$reg_no','default.jpg',0,'$phone')";

   $result = mysqli_query($con,$sql);
   if ($result) {
       $success = "Registration Successful!";
   }else{
    $error = "something wrong!";
   }
            }else{
                $password_error = "Password must be more than 4 characters";
            }
        }else{
            $username_exists = "Username must be more than 4 characters";
        }
    }
    else{
        $reg_no_exists = "This reg_no already exists";
    }

    }
    else{
    $username_exists = "This username already exists";
    }
}
    else{
        $email_exists = "This email already exist";
    }
    

   
}
}
?>

<!doctype html>
<html lang="en" class="fixed accounts sign-in">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Student Registration</title>
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
</head>

<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo">
            <h1 class="text-center">Library Management System</h1>

            <?php
            if (isset($success)) {
                ?>
                <div class="alert alert-success" role="alert">
  
                 <?= $success ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>
  <?php
 }
  ?>

<?php
            if (isset($error)) {
                ?>
                <div class="alert alert-danger" role="alert">
  
                 <?= $error ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>
  <?php
 }
  ?>
  <?php
            if (isset($email_exists)) {
                ?>
                <div class="alert alert-danger" role="alert">
  
                 <?= $email_exists ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>
  <?php
 }
  ?>
  <?php
            if (isset($username_exists)) {
                ?>
                <div class="alert alert-danger" role="alert">
  
                 <?= $username_exists ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>
  <?php
 }
 ?>
  <?php
            if (isset($reg_no_exists)) {
                ?>
                <div class="alert alert-danger" role="alert">
  
                 <?= $reg_no_exists ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>
  <?php
 }
  ?>
  <?php
            if (isset($password_error)) {
                ?>
                <div class="alert alert-danger" role="alert">
  
                 <?= $password_error ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>
  <?php
 }
  ?>
        </div>
        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form method="post" action="<?=$_SERVER['PHP_SELF'] ?>">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Full Name" name="full_name" value="<?= isset($full_name) ? $full_name:'' ?>">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php
                            if (isset($input_errors['full_name'])) {
                                echo '<span class="input-error">'.$input_errors['full_name'].'</span>';
                            }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Department" name="dept" value="<?= isset($dept) ? $dept:'' ?>">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <?php
                            if (isset($input_errors['dept'])) {
                                echo '<span class="input-error">'.$input_errors['dept'].'</span>';
                            }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="email" class="form-control" placeholder="Email_ID" name="email" value="<?= isset($email) ? $email:'' ?>">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <?php
                            if (isset($input_errors['email'])) {
                                echo '<span class="input-error">'.$input_errors['email'].'</span>';
                            }
                            ?>
                        </div>
                    
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Username" name="username"value="<?= isset($username) ? $username:'' ?>">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php
                            if (isset($input_errors['username'])) {
                                echo '<span class="input-error">'.$input_errors['username'].'</span>';
                            }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" placeholder="Password" name="password" value="<?= isset($password) ? $password:'' ?>">
                                <i class="fa fa-key"></i>
                            </span>
                            <?php
                            if (isset($input_errors['password'])) {
                                echo '<span class="input-error">'.$input_errors['password'].'</span>';
                            }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Roll NO" name="roll_no" pattern="[0-9]{7}" value="<?= isset($roll_no) ? $roll_no:'' ?>">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <?php
                            if (isset($input_errors['roll_no'])) {
                                echo '<span class="input-error">'.$input_errors['roll_no'].'</span>';
                            }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Reg NO" name="reg_no" pattern="[0-9]{10}" value="<?= isset($reg_no) ? $reg_no:'' ?>">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <?php
                            if (isset($input_errors['reg_no'])) {
                                echo '<span class="input-error">'.$input_errors['reg_no'].'</span>';
                            }
                            ?>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Phone NO" name="phone" pattern="01[0-9]{9}" value="<?= isset($phone) ? $phone:'' ?>">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <?php
                            if (isset($input_errors['phone'])) {
                                echo '<span class="input-error">'.$input_errors['phone'].'</span>';
                            }
                            ?>
                        </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="student register" value="Register" class="btn btn-primary btn-block">
                        </div>
                        <div class="form-group text-center">
                            Have an account?, <a href="sign-in.php">Sign In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="../assets/javascripts/template-script.min.js"></script>
<script src="../assets/javascripts/template-init.min.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
</body>

</html>