<?php
    require_once "../dbcon.php";
    
    if(isset($_POST['login'])){

        $email = $_POST['email'];
        $password = $_POST['password'];

        $result = mysqli_query($con, "SELECT * FROM `students` WHERE `email` = '$email' OR `username` = '$email'");
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row['password'])){
                if($row['status'] == 1){
                    echo "yes";
                }else{
                    $error = "Your status unactive!";
                }
            }else{
                $error = "Password invalid!";
            }
        }else{
            $error = "Email or Username invalid!";
        }
        
        
    }

?>


<!doctype html>
<html lang="en" class="fixed accounts sign-in">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>LMS</title>
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
        </div>
        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="<?= isset($email) ? $email : ''?>">
                                <i class="fa fa-envelope"></i>
                            </span>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                <i class="fa fa-key"></i>
                            </span>
                        </div>
                        <div class="form-group">
                            <div class="checkbox-custom checkbox-primary">
                                <input type="checkbox" id="remember-me" value="option1" checked>
                                <label class="check" for="remember-me">Remember me</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Sign in" class="btn btn-primary btn-block" name="login">
                        </div>
                        <div class="form-group text-center">
                            <a href="pages_forgot-password.html">Forgot password?</a>
                            <hr/>
                             <span>Don't have an account?</span>
                            <a href="register.php" class="btn btn-block mt-sm">Register</a>
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
