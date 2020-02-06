<?php

require_once "../dbcon.php";

if(isset($_POST['student_register'])){
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $roll = $_POST['roll'];
    $reg = $_POST['reg'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    
    $input_errors = array();

    if(empty($fname)){
        $input_errors['fname'] = "First name field is required!";
    }
    if(empty($lname)){
        $input_errors['lname'] = "Last name field is required!";
    }
    if(empty($roll)){
        $input_errors['roll'] = "Roll field is required!";
    }
    if(empty($reg)){
        $input_errors['reg'] = "Reg. no field is required!";
    }
    if(empty($email)){
        $input_errors['email'] = "Email field is required!";
    }
    if(empty($username)){
        $input_errors['username'] = "Username field is required!";
    }
    if(empty($password)){
        $input_errors['password'] = "Password field is required!";
    }
    if(empty($phone)){
        $input_errors['phone'] = "Phone field is required!";
    }
    
    if(count($input_errors) == 0 ){

        $email_check = mysqli_query($con, "SELECT * FROM `students` WHERE `email` = '$email'");
        $email_check_row = mysqli_num_rows($email_check);

        if($email_check_row == 0 ){

            $username_check = mysqli_query($con, "SELECT * FROM `students` WHERE `username` = '$username'");
            $username_check_row = mysqli_num_rows($username_check);
            
            if($username_check_row == 0 ){
                if(strlen($username) > 7){
                    if(strlen($password) > 6){
                            $pssword_hash = password_hash($password,PASSWORD_DEFAULT);
                            $result = mysqli_query($con,"INSERT INTO `students`(`fname`, `lname`, `roll`, `reg`, `email`, `username`, `password`,`status`, `phone`) VALUES ('$fname','$lname','$roll','$reg','$email','$username','$pssword_hash','0','$phone')");
                            if($result){
                                $sucess = "Resgistration Sucessfully";
                            }else{
                                $error = "Something Wrong!";
                            }
                    }else{
                        $password_error = "Password more then 7 characters!";
                    }
                }else{
                    $username_check_exists = "Username more then 8 characters!";
                }
            }else{
                $username_check_exists = "Username already exists!";  
            }
            
        }else{
            $email_check_exists = "Email already exists!";
        }
        
    }

    
}


?>



<!doctype html>
<html lang="en" class="fixed accounts sign-in">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Students Registration</title>
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../asstes/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../asstes/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../asstes/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../asstes/stylesheets/css/style.css">
</head>

<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo">
            <h1 class="text-center">LMS</h1>
            <?php 
                if(isset($sucess)){?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sucess; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php 
                }
            ?>
            <?php 
                if(isset($error)){?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php 
                }
            ?>
            <?php 
                if(isset($email_check_exists)){?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $email_check_exists; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php 
                }
            ?>
            <?php 
                if(isset($username_check_exists)){?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $username_check_exists; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php 
                }
            ?>
            <?php 
                if(isset($password_error)){?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $password_error; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php 
                }
            ?>
            
        </div>
        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Frist Name" name="fname" value="<?= isset($fname) ? $fname : ''?>">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php
                                if(isset($input_errors['fname'])){
                                    echo '<span class="input-error">'.$input_errors['fname'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control"  placeholder="Last Name" name="lname" value="<?= isset($lname) ? $lname : ''?>">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <?php
                                if(isset($input_errors['lname'])){
                                    echo '<span class="input-error">'.$input_errors['lname'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control"  placeholder="Roll" name="roll" pattern="[0-9]{6}" value="<?= isset($roll) ? $roll : ''?>">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <?php
                                if(isset($input_errors['roll'])){
                                    echo '<span class="input-error">'.$input_errors['roll'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control"  placeholder="Registration" name="reg" pattern="[0-9]{6}" value="<?= isset($reg) ? $reg : ''?>">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <?php
                                if(isset($input_errors['reg'])){
                                    echo '<span class="input-error">'.$input_errors['reg'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="email" class="form-control"  placeholder="Email" name="email" value="<?= isset($email) ? $email : ''?>">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <?php
                                if(isset($input_errors['email'])){
                                    echo '<span class="input-error">'.$input_errors['email'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control"  placeholder="UserName" name="username" value="<?= isset($username) ? $username : ''?>">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <?php
                                if(isset($input_errors['username'])){
                                    echo '<span class="input-error">'.$input_errors['username'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="password" class="form-control"  placeholder="Password" name="password">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <?php
                                if(isset($input_errors['password'])){
                                    echo '<span class="input-error">'.$input_errors['password'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control"  placeholder="01**********" name="phone" pattern="01[1|6|7|8|9][0-9]{8}" value="<?= isset($phone) ? $phone : ''?>">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <?php
                                if(isset($input_errors['phone'])){
                                    echo '<span class="input-error">'.$input_errors['phone'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Registration" name="student_register" class="btn btn-primary btn-block">
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
<script src="../asstes/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="../asstes/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../asstes/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="../asstes/javascripts/template-script.min.js"></script>
<script src="../asstes/javascripts/template-init.min.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
</body>      
</html>
