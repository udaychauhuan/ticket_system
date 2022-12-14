<?php include('../partials/header.php') ?>
<div class="main-work-pace">
    <div class="conatainer w-50 m-auto ">
        <h1 class="text-center p-4">USER DETAILS</h1>


        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">user id</th>
                    <th scope="col">user name</th>
                    <th scope="col">phone</th>
                    <th scope="col">gmail</th>
                    <th scope="col">user role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <!--proper url  for the action is './usercontroller/edit_user.php?action=edit&id=$user['id']' -->
            <tbody>
                <?php
                $id =$_SESSION['ticket_userid'];
                echo $id;
                $query = "SELECT id,name,email,phone ,role_id from user_table where id != $id";
                $conn =  new Connection;
                $tb_user = $conn->read($query);
                if (is_array($tb_user)) {
                    # code...
                    foreach ($tb_user as $row) {
                        # code...
                   ?>
                        <tr>
                            <th scope='row'><?= $row['id'] ?></th>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['phone'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['role_id'] ?></td>
                            <td style='display:flex;'>
                                <span style='position: absolute;margin-top:-10px;margin-left:-25px;'>
                                    <button type='button' class='btn btn-success'><a href='../usercontroller/edit_user.php/<?= $row['id'] ?>' style='text-decoration:none; color:white;' class='text-center fs-6'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button>
                                    <button type='button' class='btn btn-danger '><a href='../usercontroller/delete_user.php/<?= $row['id'] ?>' style='text-decoration:none; color:white;' class='text-center fs-6'><i class='fa fa-trash-o' aria-hidden='true'></i></button>
                                </span>
                            </td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <div class=" alert-dismissible text-center text-capitalize " style=" font-size:20px; " role="alert">
                        No images were found !..
                    </div>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php include('../partials/footer.php') ?>