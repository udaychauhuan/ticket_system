<?php include('../partials/header.php');

$url  = $_SERVER["PHP_SELF"];
$path = explode("/", $url);
$last = end($path);


$tk_name = $tk_desc = $tk_price = "";

$sql = " SELECT * FROM `ticket_table` where ticket_id = $last limit 1";
$conn = new Connection();

$tickets = $conn->read($sql);
if (is_array($tickets)) {
    # code..
    foreach ($tickets as $key) {
        $tk_name = $key['ticket_name'];
        $tk_desc = $key['Ticket_desk'];
        $tk_price = $key['price'];
    }
}

?>
<div class="main-work-pace">
    <div class="conatainer w-50 m-auto ">
        <h1 class="text-center p-4">EDIT TICKET</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="row g-3 border">
            <div class="col-12">
                <label for="inputAddress" class="form-label">Ticket name</label>
                <input type="text" name="tk_name" class="form-control" id="inputAddress"  value="<?= $tk_name ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Ticket description</label>
                <textarea class="form-control" name="tk_desc" id="exampleFormControlTextarea1" rows="3"placeholder="<?= $tk_desc ?>"></textarea>
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Ticket Price</label>
                <input type="number" name="price" class="form-control" id="inputAddress2" value="<?= $tk_price ?>">
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input name="check" class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Check me out
                    </label>
                </div>
            </div>
            <div class="col-12 mb-2">
                <input type="hidden" name="id" value="<?= $last ?>">
                <button type="submit" name="tk_edit" class="btn btn-primary mb-2">EDIT</button>
            </div>

        </form>

    </div>
    <a class="buttton btn-sm bg-success decoration-none text-light fs-6  " style="position:relative; display:flex; margin-left:69%;margin-right:25%; margin-top:-2.5rem;"  href="/TicketManagement/pages/ticketconroller/view_ticket.php"> go back</a>
</div>
<?php include('../partials/footer.php') ?>