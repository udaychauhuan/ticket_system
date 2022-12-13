<?php include('../partials/header.php');
$url  = $_SERVER["PHP_SELF"];
$path = explode("/", $url);
$last = end($path);

?>
<div class="main-work-pace">
    <div class="conatainer w-50 m-auto ">
        <h1 class="text-center p-4">DELETE TICKET</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
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
                    $query = "SELECT * FROM `ticket_table` WHERE ticket_id = $last";
                    $conn =  new Connection;
                    $tb_user = $conn->read($query);
                    if (is_array($tb_user)) {
                        # code...
                        foreach ($tb_user as $row) {
                            # code...
                    ?>
                            <tr>
                                <th scope='row'><?= $row['ticket_id'] ?></th>
                                <td><?= $row['ticket_name'] ?></td>
                                <td><?= $row['Ticket_desk'] ?></td>
                                <td><?= $row['price'] ?><i class="fa fa-inr" aria-hidden="true"></i></td>
                                <td style='display:flex;'>
                                    <input type="hidden" name="id" value="<?= $last ?>">
                                    <button type="submit" name="delete_ticket" class="btn btn-danger "><a href="" style="text-decoration:none; color:white;" class="text-center fs-6"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                </td>
                            </tr>
                </tbody>
            </table>
            <div class="col-4">
                <div class="form-check">
                    <input name="check" class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Check me out
                    </label>

                </div>
            </div>
        </form>
    <?php
                        }
                    } else {
    ?>
    <div class=" alert-dismissible text-center text-capitalize " style=" font-size:20px; " role="alert">
        No data found !..
    </div>
<?php
                    }
?>
    </div>
    <a class="buttton btn-sm bg-success decoration-none text-light fs-6  " style="position:relative; display:flex; margin-left:69%;margin-right:25%; margin-top:-1.8rem;"  href="/TicketManagement/pages/ticketconroller/view_ticket.php"> go back</a>
</div>
<?php include('../partials/footer.php') ?>