<?php
include('../partials/ClassLoader.php');
session_start();

$login = new Login();
$user = $login->check_login($_SESSION['ticket_userid']);
$msg = $result = "";

$id = $_SESSION['ticket_userid'];
$user_st = new User();
$user_status = $user_st->user_status($id);
if ($user_status) {
    $admin = true;
} else {
    $user1 = true;
}
// -----------------------------------------------------------------------------------------------------------------------------------------------------------------
// admin panel

// edit self (done)

if (isset($_POST['edit'])) {
    if (($_POST['check'] == 'on') && (!empty($_POST['name']) || !empty($_POST['phone'] || !empty($_POST['email']) || !empty($_POST['password'])))) {
        $user_edit = new User();
        $result = $user_edit->update_user($_POST, $_SESSION['ticket_userid']);

        if ($result) {
            $msg = "update data succesfully .";
        } else {
            $msg = "data is not updated please check again .!!!";
        }
    } else {
        $msg = "please check the  check box.!";
    }
}
// edit self
// ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// user panel

//create user()
if (isset($_POST['create_user'])) {
    if (($_POST['check'] == 'on') && (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['name']) && !empty($_POST['phone']))) {
        $create_user = new User();
        $result = $create_user->create_user($_POST);
        if ($result) {
            $msg = "user data inserted succesfully .";
        } else {
            $msg = "user data not inserted please check again .!!!";
        }
    } else {
        $msg = "please check the  check box.!";
    }
}
//create user

//view all user
// work is done 
//view all user



// edit user
if (isset($_POST['edit_user'])) {
    # code...
    if (($_POST['check'] == 'on') && (!empty($_POST['email']) || !empty($_POST['name']) || !empty($_POST['phone']))) {
        $id = $_POST['id'];
        $ed_user = new User();
        $result = $ed_user->update_user($_POST, $id);
        if ($result) {
            $msg = "user data updated succesfully .";
        } else {
            $msg = "email already present .. try anothet email.!!!";
        }
    } else {
        $msg = "please check the  check box.!";
    }
}
// edit user


// delete user
if (isset($_POST['delete_user'])) {
    # code...
    if (($_POST['check'] == 'on')) {
        $id = $_POST['id'];
        $dl_user = new User();
        $result = $dl_user->delet_user($id);
        if ($result) {
            $msg = "user deleted  succesfully .";
        } else {
            $msg = "you can't delete this user. !!!";
        }
    } else {
        $msg = "please check the  check box.!";
    }
}
// delete user

// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// ticket panel

// create ticket
if (isset($_POST['create_ticket'])) {
    if (($_POST['check'] == 'on') && (!empty($_POST['tk_name']) || !empty($_POST['tk_desc']) || !empty($_POST['tk_price']))) {
        $ct_ticket = new Ticket();
        $result = $ct_ticket->create_ticket($_POST);
        if ($result) {
            $msg = "user  succesfully .";
        } else {
            $msg = "user  not deleted please check again .!!!";
        }
    } else {
        $msg = "please check the  check box.!";
    }
}
// create ticket

// edit ticket
if (isset($_POST['tk_edit'])) {
    if (($_POST['check'] == 'on') && (!empty($_POST['tk_name']) || !empty($_POST['tk_desc']) || !empty($_POST['tk_price']))) {
        $id = $_POST['id'];
        $ed_ticket = new Ticket();
        $result = $ed_ticket->update_ticket($_POST, $id);
        if ($result) {
            $msg = "update ticket succesfully .";
        } else {
            $msg = "ticket not updated. please check again .!!!";
        }
    } else {
        $msg = "please check the  check box.!";
    }
}
// edit ticket


// delete ticket                           
if (isset($_POST['delete_ticket'])) {
    if (($_POST['check'] == 'on')) {
        $id = $_POST['id'];
        $dl_ticket = new Ticket();
        $result = $dl_ticket->delete_Ticket($id);

        // if ($result) {
        //     $msg = "user deleted  succesfully .";
        // } else {
        //     $msg = "user  not deleted please check again .!!!";
        // }
    } else {
        $msg = "please check the  check box.!";
    }
}
// delete ticket

// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// alart section

$color = "";
if ($result) {
    // for green (succesfull)
    $color = "#99ff99";
} else {
    // for red (unsuccesfull)
    $color = " #ff6666";
}

$fun = 'this.parentElement.style.display="none"';
$status_alert = "<div class='alert' style='background-color:$color;text-align:center;width:50%;margin:auto;'>
                      <span class='closebtn text-light' onclick='$fun'>&times;</span>
                      <span style='font-size:17px;color:white;'>
                              $msg
                      </span> 
                    </div>";
// alart section

?>




<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/TicketManagement/style/admin&user.css">
</head>

<body>

    <!-- side manu bar -->
    <div id="mySidenav" class="sidenav" style="background: linear-gradient(to right, #FF4B2B, #FF416C)!important;text-decoration:none;color:white;">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <?php
        if ( $user || $admin){
            # code...
        ?>
        <li 
        <!-- profile details -->
        <li class="nav-item dropdown" style="list-style-type:none;">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                PERSONAL<br>
                DETAILS</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="../index.php" target=""> VIEW</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item " href="../admincontroller/Edit_admin.php">EDIT</a>
            </div>
        </li>
        <?php
        }
        if ($admin) {
            # code...
       
        ?>
        <div class="dropdown-divider"></div>
        <!-- user details in case of admin -->
        <li class="nav-item dropdown" style="list-style-type:none;">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                USER</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="../usercontroller/view_user.php"><i class="fa fa-eye" aria-hidden="true"></i> VIEW USER</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item " href="../usercontroller/create_user.php"><i class="fa fa-plus-circle" aria-hidden="true"></i> CREATE <br> USER</a>
            </div>
        </li>
        <div class="dropdown-divider"></div>
        <!-- ticket details in case of admin -->
        <li class="nav-item dropdown" style="list-style-type:none;">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                TICKET</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="../ticketconroller/view_ticket.php"><i class="fa fa-eye" aria-hidden="true"></i> VIEW TICKET</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item " href="../ticketconroller/create_ticket.php"> <i class="fa fa-plus-circle" aria-hidden="true"></i> CREATE <br> TICKET</a>
            </div>
        </li>
        <?php
         }
        
        ?>
        <div class="dropdown-divider"></div>
        <!-- logout function -->
        <a href="../logout.php"><i class="fa fa-power-off"></i><span> LOGOUT </span></a>
    </div>
    <!-- side manu bar -->

    <div id="main">


        <!-- top mnav bar  -->
        <nav class="navbar navbar-expand-lg navbar-dark " style="background: linear-gradient(to right, #FF4B2B, #FF416C)!important;text-decoration:none;color:white;">
            <a class="navbar-brand" href="#">Ticket Managment system</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active d-flex">
                        <!-- user profile -->
                        <span style="color: white; margin-top:7px" style="position: absolute;"><i class="fa fa-user"></i></span>
                        <a class="nav-link" href="#"><?= $user['name'] ?> <span class="sr-only">(current)</span></a>
                        <div class="dropdown mr-5">
                            <button class="btn btn-secondary dropdown-toggle " type="button" data-toggle="dropdown" aria-expanded="false">
                            </button>
                            <div class="dropdown-menu ">
                                <a class="dropdown-item" href="#">PROFILE </a>
                                <a class="dropdown-item" href="../logout.php">LOGOUT </a>
                            </div>
                        </div>

                    </li>
                </ul>
            </div>
        </nav>

        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
        <!-- display the status of the given command -->
        <?php echo empty($msg) ? " " : $status_alert ?>