<?php
include('../class/classloader.php');
include('../pages/sent_mail/mail/mail.php');
$msg = "";

$register = false;
$login = false;
$result = "";
$name = $phone = $email = $password = $confirm_password = "";
$nameErr = $emailErr = $phoneErr = $PasswordErr = $confirm_passwordErr = "";
$status_alert = "";
//  here is your registration protal code is placed 
if (isset($_POST['register']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    //incase of fals
    $register = true;
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = $_POST['name'];
    }

    if (empty($_POST['phone'])) {
        $phoneErr = "Phone is required";
    } else {
        $phone = $_POST['phone'];
    }

    if (empty($_POST['email'])) {
        $emailErr = "email is required";
    } else {
        $email = $_POST['email'];
    }

    if (empty($_POST['password'])) {
        $PasswordErr = "Password is required";
    } else {
        $password = $_POST['password'];
    }
    if (empty($_POST['confirm_password'])) {
        $confirm_passwordErr = "confirm Password is required";
    } else {
        $confirm_password = $_POST['confirm_password'];
    }

    if ((isset($_POST['name']) && $_POST['name'] != "") && (isset($_POST['phone']) && $_POST['phone'] != "") && (isset($_POST['email']) && $_POST['email'] != "") && (isset($_POST['password']) && $_POST['password'] != "") && (isset($_POST['confirm_password']) && $_POST['confirm_password'] != "")) {
        $sign = new Signup();
       // echo "step1";
        $result = $sign->create_user($_POST);
        /* include('../class/sent_mail/mail.php');
        $mail = new Php_mailer($_POST['email'], $_POST['password'], $_POST['name']);
        $mail->SendMail(); */
        if ($result) {
            // header("location: login&signup.php");
            // die;
        } else {
           // echo "already presnt email";
            $msg = "this email is alreay registered .. try another gmail.";
        }
    }
} elseif (isset($_POST['login']) || $_SERVER['REQUEST_METHOD'] == 'POST') {

    session_start();
    $login = true;
    if (empty($_POST['email'])) {
        $emailErr = "email is required";
    } else {
        $email = $_POST['email'];
    }
    if (empty($_POST['password'])) {
        $PasswordErr = "Password is required";
    } else {
        $password = $_POST['password'];
    }
    if (isset($_POST['email']) && isset($_POST['password'])) {
        # done from this side
        $login = new Login();
        $result = $login->Evaluat($_POST);
        if ($result == "") {
            header("location:index.php");
            die;
        } else {
            # code...
            $msg = $result;
        }
    }
}
if (isset($_POST['register']) && (!empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password']))) {
    //condition to check that is $msg empty or not
    $color = "";
    if (!$result) {
        $color = " #ff6666";
    } else {
        $color = "#99ff99";
        $msg = " Registration succesfull. ";
    }
    
    $fun = 'this.parentElement.style.display="none"';
    $status_alert = "<div class='alert' style='background-color:$color;text-align:center;'><span class='closebtn' onclick='$fun'>&times;</span>
                              <span style='font-size:17px;color:white;'>
                               $msg
                              </span>
                         </div>";
} elseif (isset($_POST['login']) && (!empty($_POST['email']) && !empty($_POST['password']))) {
    $color = "";
    if ($result) {
        $color = " #ff6666";
        $msg = $result;
    } else {
        $color = "#99ff99";
        $msg = " login succesfully ";
    }

    # code...
    $fun = 'this.parentElement.style.display="none"';
    $status_alert = "<div class='alert' style='background-color:$color;text-align:center;'><span class='closebtn' onclick='$fun'>&times;</span>
                              <span style='font-size:17px;color:white;'>
                              $msg
                              </span>
                         </div>";
} elseif ((isset($_POST['login']) || isset($_POST['register'])) && ((empty($_POST['name']) || empty($_POST['phone']) || empty($_POST['email']) || empty($_POST['password'])))) {
    # code...
    $fun = 'this.parentElement.style.display="none"';
    $status_alert = "<div class='alert' style='background-color:#ff6666;text-align:center;'><span class='closebtn' onclick='$fun'>&times;</span>
                              <span style='font-size:17px;color:white;'>
                              Please fill all the required fields
                              </span>
                         </div>";
} else {
    $status_alert = "";
}




?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SignUp and Login</title>

    <link rel="stylesheet" type="text/css" href="../style/login_style.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!-- status alart -->
    <?= $status_alert ?>


    <div class="container " id="container">
        <div class="form-container sign-up-container">
            <!-- registrattion /signup form	 -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="signup-form">
                <div class="alert">
                </div>
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="social"><i class="fa fa-google"></i></a>
                    <a href="#" class="social"><i class="fa fa-linkedin"></i></a>
                </div>
                <span>or use your email for registration</span>

                <input type="text" name="name" value="<?= $name ?>" placeholder="Name">
                <span class="error"> <?php if ($register == true) {
                                            echo $nameErr;
                                        } ?></span>
                <input type="number" name="phone" value="<?= $phone ?>" placeholder="phone">
                <span class="error"><?php if ($register == true) {
                                        echo $phoneErr;
                                    } ?></span>
                <input type="email" name="email" value="<?= $email ?>" placeholder="Email">
                <span class="error"><?php if ($register == true) {
                                        echo $emailErr;
                                    } ?></span>
                <input type="password" name="password" placeholder="Password">
                <span class="error"><?php if ($register == true) {
                                        echo $PasswordErr;
                                    } ?></span>
                <input type="password" name="confirm_password" placeholder="confirm Password">
                <span class="error"><?php if ($register == true) {
                                        echo $confirm_passwordErr;
                                    } ?></span>

                <input type="submit" name="register" class="button" style="background-color: #FF4B2B; width: 9rem;"></input>

            </form>
        </div>

        <div class="form-container sign-in-container">

            <!-- login form -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <h1>Sign In</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="social"><i class="fa fa-google"></i></a>
                    <a href="#" class="social"><i class="fa fa-linkedin"></i></a>
                </div>
                <span>or use your account</span>
                <input type="email" name="email" value="<?= $email ?>" placeholder="Email">
                <span class="error"><?php if ($login == true) {
                                        echo $emailErr;
                                    } ?></span>
                <input type="password" name="password" placeholder="Password">
                <span class="error"><?php if ($login == true) {
                                        echo $PasswordErr;
                                    } ?></span>
                <a href="#">Forgot Your Password</a>

                <input type="submit" name="login" class="button" style="background-color: #FF4B2B; width: 9rem;"></input>
            </form>


        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn"> Sign in</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        //for swapping signup and sign-in
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });
        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });

        // Get all elements with class="closebtn"
        var close = document.getElementsByClassName("closebtn");
        var i;

        // Loop through all close buttons
        for (i = 0; i < close.length; i++) {
            // When someone clicks on a close button
            close[i].onclick = function() {

                // Get the parent of <span class="closebtn"> (<div class="alert">)
                var div = this.parentElement;

                // Set the opacity of div to 0 (transparent)
                div.style.opacity = "0";

                // Hide the div after 600ms (the same amount of milliseconds it takes to fade out)
                setTimeout(function() {
                    div.style.display = "none";
                }, 600);
            }
        }
    </script>


</body>

</html>