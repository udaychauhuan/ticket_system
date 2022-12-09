<?php include('../partials/header.php') ?>
<div class="main-work-pace">
    <div class="conatainer w-50 m-auto ">
        <h1 class="text-center p-4">VIEW TICKET</h1>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">ticket id</th>
                    <th scope="col">ticket name</th>
                    <th scope="col">description</th>
                    <th scope="col">price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = " SELECT * FROM `ticket_table`";
                $conn = new Connection();
                $tickets = $conn->read($sql);
                if (is_array($tickets)) {
                    # code..
                    foreach ($tickets as $key) {
                        # code...
                ?><tr>
                            <th scope="row"><?= $key['ticket_id'] ?></th>
                            <td><?= $key['ticket_name'] ?></td>
                            <td><?= $key['Ticket_desk'] ?></td>
                            <td><span><?= $key['price'] ?></span><i class="fa fa-inr" aria-hidden="true"></i></td>
                            <td style="display:flex;">
                                <span style="position: absolute;margin-top:-10px;margin-left:-25px;">
                                    <button type='button' class='btn btn-success'><a href='../ticketconroller/edit_ticket.php/<?= $key['ticket_id'] ?>' style='text-decoration:none; color:white;' class='text-center fs-6'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button>
                                    <button type='button' class='btn btn-danger '><a href='../ticketconroller/delet_ticket.php/<?= $key['ticket_id'] ?>' style='text-decoration:none; color:white;' class='text-center fs-6'><i class='fa fa-trash-o' aria-hidden='true'></i></button>
                                </span></span>
                            </td>
                        </tr>
                <?php


                    }
                }

                ?>
            </tbody>
        </table>
    </div>
</div>
<?php include('../partials/footer.php') ?>