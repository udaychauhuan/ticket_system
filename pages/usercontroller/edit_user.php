<?php include('../partials/header.php');

$url  = $_SERVER["PHP_SELF"];
$path = explode("/", $url);
$last = end($path);


$name = $phone = $email = $role = "";
$query = "SELECT id,name,email,phone,role_id from user_table";
$conn =  new Connection;
$tb_user = $conn->read($query);
if (is_array($tb_user)) {
    foreach ($tb_user as $row) {
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $role = $row['role_id'];
    }
}
?>
<!--  edit user -->
<div class="main-work-pace">
    <div class="conatainer w-50 m-auto ">
        <h1 class="text-center p-4">EDIT USER DETAILS</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="row g-3 border">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">email</label>
                <input type="email" name="email" class="form-control" id="inputEmail4" value="<?= $email?>">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="inputAddress" value="<?= $name?>">
            </div>
            <div class="col-6">
                <label for="inputAddress2" class="form-label">phone no.</label>
                <input type="number" name="phone" class="form-control" id="inputAddress2" value="<?= $phone?>">
            </div>
            <div class="col-6">
                <label for="inputAddress2" class="form-label">User role</label>
                <input type="number" name="role" class="form-control" id="inputAddress2"value="<?= $role?>">
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input name="check" class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Check me out
                    </label>
                </div>
            </div>
            <div class="col-12 mb-3">
                <input type="hidden" name="id" value="<?= $last ?>">
                <button type="submit" name="edit_user" class="btn btn-primary">edit</button>
            </div>
        </form>

    </div>
    <a class="buttton btn-sm bg-success decoration-none text-light fs-6 mb-3  " style="position:relative; display:flex; margin-left:69%;margin-right:25%; margin-top:-2.5rem;"  href="/TicketManagement/pages/usercontroller/view_user.php"> go back</a>
</div>
<?php include('../partials/footer.php') ?>