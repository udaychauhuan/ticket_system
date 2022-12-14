<!-- view your datails -->
<div class="main-work-pace">
    <div class="container  border-info  rounded bg-info " style="text-decoration:none;color:white;width:65%;opacity:0.7;box-shadow:5px solid  #ffebe6 ">
        <h1 class="text-center"><?= $user['name'] ?></h1>
        <div>
            <div class="conatiner">

                <p class="text-center">
                    (<?= $user['role_id'] == 1 ? "admin" : " user " ?>)
                </p>
            </div>
        </div>
    </div>
    <!-- chart can be placed here -->
    <div class="row  d-flex justify-content-center text-center p-auto my-5">
        <?php
        $sql = "SELECT `ticket_id` FROM `ticket_table`";
        $conn = new Connection;
        $result = $conn->read($sql);
        $total_ticket = 0;
        if (is_array($result)) {
            foreach ($result as $key) {
                $total_ticket++;
            }
        }
        ?>
        <div class="col-lg-3 col-sm-4">
            <div class="card rounded-circle border-info shadow-lg p-3 mb-5" style="width: 18rem;height:18rem;background:linear-gradient(to right, #FF4B2B, #FF416C)!important;text-decoration:none;color:white;">
                <div class="card-body mt-5">
                    <h1 class="card-title " style="font-size: 5rem;"><?= $total_ticket ?></h1>
                    <h3 class="card-subtitle mb-2 text-muted">Total Ticket </h3>

                </div>
            </div>
        </div>
        <?php
        $sql = "SELECT * FROM `purchase_table` WHERE 1";
        $conn = new Connection;
        $result = $conn->read($sql);
        $t_tk_pur_count = 0;
        if (is_array($result)) {
            foreach ($result as $key) {
                $t_tk_pur_count++;
            }
        }
        ?>
        <div class="col-lg-3 col-sm-4">
            <div class="card rounded-circle border-info shadow-lg p-3 mb-5" style="width: 18rem;height:18rem;background:linear-gradient(to right, #FF4B2B, #FF416C)!important;text-decoration:none;color:white;">
                <div class="card-body mt-5">
                    <h1 class="card-title" style="font-size: 5rem;"><?= $t_tk_pur_count ?></h1>
                    <h3 class="card-subtitle mb-2 text-muted">Total Purchased Count </h3>

                </div>
            </div>
        </div>
        <?php
        $sql = "SELECT Ticket_price FROM `purchase_table`";
        $conn = new Connection;
        $result = $conn->read($sql);
        $total = 0;
        if (is_array($result)) {
            foreach ($result as $key) {
                $total = $key['Ticket_price'];
                $grand_total += $total;
            }
        }
        ?>
        <div class="col-lg-3 col-sm-4">
            <div class="card rounded-circle border-info shadow-lg p-3 mb-5" style="width: 18rem;height:18rem;background:linear-gradient(to right, #FF4B2B, #FF416C)!important;text-decoration:none;color:white;">
                <div class="card-body mt-5">
                    <h1 class="card-title" style="font-size: 3.5rem;"><?= $grand_total ?> <i class="fa fa-inr" aria-hidden="true"></i></h1>
                    <h3 class="card-subtitle mb-2 text-muted">Total Amount</h3>

                </div>
            </div>
        </div>
        <?php

        ?>
    </div>

    <div class="row container m-auto p-auto " style="margin-left: 15.5rem!important; margin-bottom:10px;">
        <div class="col-lg-5 col-sm-11">
            <ul class="list-group">
                <li class="list-group-item active bg-info fs-3" aria-current="true">All purchased Tickets</li>
                <li class="list-group-item">A second item</li>
                <li class="list-group-item">A third item</li>
                <li class="list-group-item">A fourth item</li>
                <li class="list-group-item">And a fifth one</li>
            </ul>
        </div>
        <div class="col-lg-5 col-sm-11">
            <ul class="list-group">
                <li class="list-group-item active bg-info fs-3" aria-current="true">List of purchasers</li>
                <li class="list-group-item">A second item</li>
                <li class="list-group-item">A third item</li>
                <li class="list-group-item">A fourth item</li>
                <li class="list-group-item">And a fifth one</li>
            </ul>
        </div>
    </div>

</div>