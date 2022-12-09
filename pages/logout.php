<?php

session_start();

if(isset($_SESSION['ticket_userid'])){
    # code...
    $_SESSION['ticket_userid']= NULL;
    unset($_SESSION['ticket_userid']);
}
header("location: login&signup.php");
die;

?>