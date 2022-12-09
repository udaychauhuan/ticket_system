<?php
include('../class/classloader.php');
$msg = "";

$register = false;
$result = "";
$name = $phone = $email = $password = $confirm_password = "";
$nameErr = $emailErr = $phoneErr = $PasswordErr = $confirm_passwordErr = "";
$status_alert = "";
//  here is your registration protal code is placed 
if ((isset($_POST['register']) && $_SERVER['REQUEST_METHOD'] == 'POST') && (isset($_POST['name']) && $_POST['name'] != "") && (isset($_POST['phone']) && $_POST['phone'] != "") && (isset($_POST['email']) && $_POST['email'] != "") && (isset($_POST['password']) && $_POST['password'] != "") && (isset($_POST['confirm_password']) && $_POST['confirm_password'] != "")) {
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

    
        $sign = new Signup();
        $result = $sign->create_user($_POST);
        if ($result){
            header("location:login&signup.php");
            die;
        }

    $fun = 'this.parentElement.style.display="none"';
    $status_alert = "<div class='alert' style='background-color:#99ff99;text-align:center;'><span class='closebtn' onclick='$fun'>&times;</span>
                              <span style='font-size:17px;color:white;'>
                               Registration succesfully .
                              </span>
                         </div>";
}else{
    $fun = 'this.parentElement.style.display="none"';
    $status_alert = "<div class='alert' style='background-color:#ff6666;text-align:center;'><span class='closebtn' onclick='$fun'>&times;</span>
                              <span style='font-size:17px;color:white;'>
                              Please fill all the required fields
                              </span>
                         </div>";
}

