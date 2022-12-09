<?php 
include('../class/classloader.php');
session_start();
if(isset($_SESSION['ticket_userid']))
    {
    $login = new Login();
    $user = $login->check_login($_SESSION['ticket_userid']);
    }else {
        header("location: login&signup.php");
        die;
    }

?>

<!-- header -->
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
    <link rel="stylesheet" href="../style/admin&user.css">
</head>

<body>

    <!-- side manu bar -->
    <div id="mySidenav" class="sidenav" style="background: linear-gradient(to right, #FF4B2B, #FF416C)!important;text-decoration:none;color:white;">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <!-- profile details -->
        <li class="nav-item dropdown" style="list-style-type:none;">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                PERSONAL<br>
                DETAILS</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="index.php"> VIEW</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item " href="./admincontroller/Edit_admin.php">EDIT</a>
            </div>
        </li>
        <div class="dropdown-divider"></div>
        <!-- user details in case of admin -->
        <li class="nav-item dropdown" style="list-style-type:none;">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                USER</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="./usercontroller/view_user.php"><i class="fa fa-eye" aria-hidden="true"></i> VIEW USER</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item " href="./usercontroller/create_user.php"><i class="fa fa-plus-circle" aria-hidden="true"></i> CREATE <br> USER</a>
            </div>
        </li>
        <div class="dropdown-divider"></div>
        <!-- ticket details in case of admin -->
        <li class="nav-item dropdown" style="list-style-type:none;">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                TICKET</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="./ticketconroller/view_ticket.php"><i class="fa fa-eye" aria-hidden="true"></i> VIEW TICKET</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item " href="./ticketconroller/create_ticket.php"> <i class="fa fa-plus-circle" aria-hidden="true"></i> CREATE <br> TICKET</a>
            </div>
        </li>
        <div class="dropdown-divider"></div>
        <!-- logout function -->
        <a href="./logout.php"><i class="fa fa-power-off"></i><span> LOGOUT </span></a>
    </div>
    <!-- side manu bar -->

    <div id="main">


        <!-- top mnav bar  -->
        <nav class="navbar navbar-expand-lg navbar-dark " style="background: linear-gradient(to top, #FF4B2B, #FF416C)!important;">
            <a class="navbar-brand" href="#">Ticket Managment system</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active d-flex">
                        <!-- user profile -->
                        <span style="color: white; margin-top:7px" style="position: absolute;"><i class="fa fa-user"></i></span>
                        <a class="nav-link" href="#"><?= $user['name']?> <span class="sr-only">(current)</span></a>
                        <div class="dropdown mr-5">
                            <button class="btn btn-secondary dropdown-toggle " type="button" data-toggle="dropdown" aria-expanded="false">
                            </button>
                            <div class="dropdown-menu ">
                                <a class="dropdown-item" href="#">PROFILE </a>
                                <a class="dropdown-item" href="./logout.php">LOGOUT </a>
                            </div>
                        </div>

                    </li>
                </ul>
            </div>
        </nav>

        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

        <div id="main-work-place">
            <!-- main working area -->
           <?php include('./admincontroller/view_admin.php')?>
            <!-- MAIN work place end -->
        </div>

    </div>

    <!-- footer -->

    <!-- scrip for side manu bar -->
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }
    </script>

</body>

</html>