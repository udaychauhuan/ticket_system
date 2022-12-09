
<?php include('../partials/header.php');?>
<div class="main-work-pace">
    <div class="conatainer w-50 m-auto ">
        <h1 class="text-center p-4"> EDIT YOUR DETAILS</h1>

        <form method="Post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="row g-3 border">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="inputEmail4" value="<?= $user['email']?>">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="inputPassword4" value="<?= $user['password']?>">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="inputAddress" placeholder="Enter your name" value="<?= $user['name']?>">
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">phone no.</label>
                <input type="number" name="phone" class="form-control" id="inputAddress2" placeholder="Enter your phone number" value="<?= $user['phone']?>">
            </div>
            <!-- <div class="input-group mb-3">
                        <input type="file" class="form-control" id="inputGroupFile02">
                        <label class="input-group-text" for="inputGroupFile02">upload profile</label>
                    </div> -->
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" name="check" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Check me out
                    </label>
                </div>
            </div>
            <div class="col-12">
                <input type="submit" class="btn btn-primary mb-2" name="edit" value="Edit">
            </div>

        </form>


    </div>
</div>
<?php include('../partials/footer.php')?>