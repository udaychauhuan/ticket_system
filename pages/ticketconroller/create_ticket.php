<?php include('../partials/header.php') ?>

<div class="main-work-pace">
    <div class="conatainer w-50 m-auto ">
        <h1 class="text-center p-4">CREATE TICKET</h1>
        <form method="Post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="row g-3 border">
            <div class="col-6">
                <label for="inputEmail4" class="form-label">Ticket name</label>
                <input type="text" name="tk_name" class="form-control" id="inputEmail4" placeholder="ticket name please">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Ticket description</label>
                <textarea class="form-control" name="tk_desc" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Ticket Price</label>
                <input type="number" name="tk_price" class="form-control" id="inputAddress2" placeholder="Enter your phone number">
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input name="check" class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Check me out
                    </label>
                </div>
            </div>
            <div class="col-12">
                <input type="submit" name="create_ticket" value="create" class="btn btn-primary mb-2">
            </div>
        </form>

    </div>
</div>
<?php include('../partials/footer.php') ?>