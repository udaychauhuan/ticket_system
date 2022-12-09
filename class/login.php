<?php

class Login
{

    private $Error = "";
    public function Evaluat($data)
    {
        $email = addslashes($data['email']);
        $password = addslashes($data['password']);
        $sql = "select * from user_table where email = '$email' limit 1";
        $conn = new Connection();
        $result = $conn->read($sql);
        if ($result) {
            # code...
            $row = $result[0];
            if ($password == $row['password']) {
                # done from this side
                $_SESSION['ticket_userid'] = $row['id'];
            } else {
                $this->Error .= "Wrong email or password <br>";
            }
        } else {
            $this->Error .= "Wrong email or password <br>";
        }
        return $this->Error;
    }

    public function check_login($id)
    {
        if (is_numeric($id)) {
            // $query = "select * from  user_table where id = '$id' limit 1";
            // $conn = new Connection();
            // $result = $conn->read($query);
            $conn = mysqli_connect('localhost', 'root', '', 'ticket_db');
            $sql = "select * from user_table where id = '$id' ";
            $result = mysqli_query($conn, $sql)->fetch_assoc();
            if ($result) {
                # code...
                $user_data = $result;
                return $user_data;
            } else {
                header("location: login&signup.php");
                die;
            }
        }
    }
}
