<?php
$user_id = $_SESSION['ticket_userid'];
$total = "";

?>
<div class="main-work-pace">
    <div class="conatainer " style="width:70%!important;margin:auto; ">
        <!-- navbar -->
        <nav class="navbar bg-light">
            <div class="container-fluid">
                <p class="navbar-brand">Tickets are here . </p>
                <!-- cart functionality -->
                <form action="./purchase_system.php" method="post">
                    <!-- Large button groups (default and split) -->
                    <div class="btn-group">
                        <button class="btn btn-outline-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                        <ul class="dropdown-menu">
                            <?php
                            $sql = "SELECT  `ticket_id`, `ticket_name`, `Ticket_price` FROM `purchase_table` WHERE user_id =$user_id limit 7";
                            $conn = new Connection();
                            $result = $conn->read($sql);
                            $grand_total = "";
                            if (is_array($result)) {
                                foreach ($result as $row) {
                                    $total = $row['Ticket_price'];
                                    $grand_total += $total;
                                    $ticket_name = $row['ticket_name'];

                                    // echo "<pre>";
                                    // print_r($row);
                                    // echo "</pre>";
                            ?>
                                    <li>

                                        <p class="dropdown-item d-flex" href="#"><span><i class="fa fa-ticket" aria-hidden="true"></i>
                                            <?=  $row['ticket_name']; ?>  </span><span>
                                            <a class="d-inline" href="./purchase_system.php/<?= $row['ticket_id'] ?>/<?= $user_id ?>" name="remove_item" type="btn" style="border: none;">
                                            <span class="text-muted p-2"><i class="fa fa-minus" aria-hidden="true"></i></span> 
                                            </a></span></p>
                                    </li>

                            <?php

                                }
                            } else {
                                $grand_total = 0;
                            }
                            ?>
                            <hr class="dropdown-divider">

                            <li><a class="dropdown-item" href="#"><i class="fa fa-ticket" aria-hidden="true"></i>TOTAL <span><?= $grand_total ?> </span><i class="fa fa-inr" aria-hidden="true"></i></a></a></li>
                        </ul>
                    </div>
                </form>
                <?php

                ?>
            </div>
        </nav>

        <?php
        $sql = " SELECT * FROM `ticket_table`";
        $conn = new Connection();
        $tickets = $conn->read($sql);
        if (is_array($tickets)) {
            # code..
            foreach ($tickets as $key) {
        ?>
                <!-- ticket list -->
                <div class="ticket p-4 mt-3 " style="color: black; background:#f0f0f5;">

                    <form action="../pages/purchase_system.php" method="post">
                        <div class="row">
                            <div class="col-lg-2 col-sm-6 ">
                                <span class=" " style="font-size:5rem;"><i class="fa fa-ticket" aria-hidden="true"></i></span>
                            </div>
                            <div class="col-lg-2 col-sm-6 " style="margin-top:2rem; margin-left:5px;">
                                <!-- tickiet name -->
                                <h1 class="text-uppercase fs-2 text-muted"><?= $key['ticket_name'] ?></h1>
                            </div>
                            <div class="col-lg-4 col-sm-6 " style="margin-top:2rem; margin-left:5px;">
                                <!-- tickiet description -->
                                <h1 class="text-capitalize fs-3 text-muted"><?= $key['Ticket_desk'] ?></h1>
                            </div>
                            <div class="col-lg-2 col-sm-6" style="margin-top:2rem; margin-left:5px;">
                                <!-- tickiet price -->
                                <h1 class="fs-3 text-muted"><?= $key['price'] ?><i class="fa fa-inr" aria-hidden="true"></i></h1>
                            </div>
                            <div class="col-lg-1 col-sm-6" style="margin-top:2rem; margin-left:5px;">
                                <!-- purchase button -->
                                <input type="hidden" name="user_id" value="<?= $user_id ?>">
                                <input type="hidden" name="tk_id" value="<?= $key['ticket_id'] ?>">
                                <button type="submit" name="buy_tickete" class="btn btn-success">buy</button>

                            </div>

                        </div>


                    </form>
                </div>
        <?php
            }
        }
        ?>

    </div>
</div>
<script>
    function delete_product(id) {

    }
</script>