<?php
include('../class/classloader.php');
extract($_POST);
$msg = "";
$login = false;
$result = "";
$email = $password = "";
$emailErr =  $PasswordErr = "";
$status_alert = "";
if (isset($_POST['login']) || $_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = true;
    if (empty($email)) {
        $emailErr = "email is required";
    } else {
        $email = $email;
    }
    if (empty($_POST['password'])) {
        $PasswordErr = "Password is required";
    } else {
        $password = $_POST['password'];
    }

    session_start();
    if (isset($_POST['login']) || (!empty($_POST['email']) && !empty($_POST['password']))) {
        # code...
        $login = new Login();
        $result = $login->Evaluat($_POST);
        
        if ($result == "success") {
            echo "done";
            header("location: index.php");
            die;
        }
    }
}
if (isset($_POST['login']) && (!empty($_POST['email']) && !empty($_POST['password']))) {
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
} elseif (isset($_POST['login'])  && ((empty($_POST['name']) || empty($_POST['phone']) || empty($_POST['email']) || empty($_POST['password'])))) {
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


?>