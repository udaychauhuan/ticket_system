<?php

class User
{

  public function __construct()
  {
    //creating the object of connection class
    $this->conn = new Connection();
  }

  //create user 
  public function create_user($data)
  {
    $name = addslashes($data['name']);
    $phone = addslashes($data['phone']);
    $email = addslashes($data['email']);
    $role =  $data['role'];
    $password = $data['password'];

    // $query = "INSERT INTO `user_table` (`id`, `name`, `email`, `phone`, `purchase`, `role_id`, `password`)
    //  SELECT * FROM (SELECT '' AS id, '$name' AS name, '$email' AS email,'$phone' AS phone,'' AS purchase , '$role' AS role_id , '$password' AS password) AS tmp
    //  WHERE NOT EXISTS (
    //      SELECT email FROM user_table WHERE email = '$email'
    //  ) LIMIT 1";

    $query = "INSERT INTO `user_table` ( `name`, `email`, `phone`,  `role_id`, `password`)
    SELECT * FROM (SELECT '$name' AS name, '$email' AS email,'$phone' AS phone,'0' AS role_id , '$password' AS password) AS tmp WHERE NOT EXISTS (
    SELECT email FROM user_table WHERE email = '$email') LIMIT 1";
    $conn = new Connection();
    $result = $conn->save($query);
    if ($result) {
      # code...
      return true;
    } else {
      return false;
    }
  }

  //update self details
  public function update_self($data, $id)
  {
    $name = $data['name'];
    $phone = $data['phone'];
    $email = $data['email'];
    $password = $data['password'];
    $query = "UPDATE `user_table` SET `name`='$name',`email`='$email',`phone`='$phone',`password`='$password' WHERE id = $id";
    $conn = new Connection;
    $result = $conn->save($query);
    if ($result) {
      return true;
    } else {
      return false;
    }
  }

  //update user credentials
  public function update_user($data, $id)
  {
    $name = $data['name'];
    $phone = $data['phone'];
    $email = $data['email'];
    $role =  $data['role'];
    $conn = new Connection;
    $sql = "SELECT  `email` FROM `user_table`";
    $check_mail = $check_mail1 = 0;

    // code for preventing doublicate gmail
    $result1 = $conn->read($sql);
    if (is_array($result1)) {
      foreach ($result1 as $key) {
        # code...
        if ($email == $key['email']) {
          $check_mail++;
        } else {
          $check_mail1++;
        }
      }
    }
    if (($check_mail <= 1) && ($check_mail1 >= 0)) {

      $query = "UPDATE `user_table` SET `name`='$name',`email`='$email',`phone`='$phone',`role_id`='$role' WHERE id = $id";
      $result = $conn->save($query);
      if ($result) {
        return true;
      }
    } else {
      return false;
    }
  }


  //delet user
  public function delet_user($id)
  {
    $conn = new Connection;
    //checking that user purchas  anny thing or not;
    $sql1 = "SELECT * FROM `purchase_table` WHERE user_id = $id";
    $result1 = $conn->read($sql1);
    if (!$result1) {
      $sql = "DELETE FROM `user_table` WHERE id = $id";
      $result = $conn->save($sql);
      if ($result) {
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  //view all user
  public function view_all()
  {
    // already done 
  }

  //view one user
  public function view($id)
  {
    $query = "SELECT * FROM `user_table` WHERE id = $id LIMIT 1";
    $conn = new Connection;
    $result = $conn->save($query);
    if ($result) {
      # code...
      return true;
    } else {
      # code...
      return false;
    }
  }

  //check user status
  public function user_status($id)
  {
    $sql = "SELECT `role_id` FROM `user_table` WHERE id = $id";
    $conn = new Connection();
    $result1 = $conn->read($sql);
    $result = "";
    if (is_array($result1)) {
      # code..
      foreach ($result1 as $key) {
        $result = $key['role_id'];
      }
    }
    if ($result) {
      # code...
      return true;
    } else {
      # code...
      return false;
    }
  }
}
