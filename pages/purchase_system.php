<?php

include('../class/connection.php');

$user_name = $ticket_name = $ticket_price = $user_id = $ticket_id = "";
if (isset($_POST['buy_tickete'])) {
    # code...
    $ticket_id = $_POST['tk_id'];
    $user_id = $_POST['user_id'];
    //echo "user id is ".$us_id. " and ticket id is ".$tk_id;
    //get elemenyts from the user table 
    $conn = new Connection();
    $sql = "SELECT `id`, `name` FROM `user_table` WHERE id = $user_id";
    $result = $conn->read($sql);
    if ($result) {
        $user_name = $result[0]['name'];
    }

    //  get elements from ticket table
    $sql2 = "SELECT `ticket_id`, `ticket_name`, `price` FROM `ticket_table` WHERE `ticket_id` = $ticket_id";
    $result2 = $conn->read($sql2);
    if ($result2) {
        $ticket_name = $result2[0]['ticket_name'];
        $ticket_price = $result2[0]['price'];
    }
    //echo "ticket name is ".$ticket_name. " and ticket price is ".$ticket_price . "and user name is ".$user_name;
    $date = date('Y-m-d H:i:s');
    $sql = "INSERT INTO `purchase_table`( `user_id`, `user_name`, `purchase_date`, `ticket_id`, `ticket_name`, `Ticket_price`) VALUES ('$user_id','$user_name','$date','$ticket_id','$ticket_name','$ticket_price')";

    $result = $conn->save($sql);
    if ($result) {
        header("location:index.php");
        die;
    } else {
        # code...
        echo "data not inserted";
    }
}

$tk_id = $us_id = "";
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
$tk_id = $uri_segments[4]; // for www.example.com/user/account you will get 'user
$us_id = $uri_segments[5];

$sql = "DELETE FROM  `purchase_table` WHERE ticket_id = $tk_id AND user_id =$us_id";
$conn = new Connection();
$result = $conn->save($sql);
if ($result) {
    header("location: /TicketManagement/pages/index.php");
    die;
} else {
    # code...
    echo "data not inserted";
}
