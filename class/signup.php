<?php
class Signup
{

    private $Error = "";

    //evalute data comes from signup form

    public function Evaluate($data)
    {
        $password = $confirm_password = " ";
        # code...
        foreach ($data as $key => $value) {
            # code...
            if (empty($value)) {

                $this->Error .= $key . "  is empty ! <br>";
            }

            if ($key == "email") {

                if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $value)) {
                    $this->Error  =   $this->Error . " please enter a valid email address ! <br>";
                }
            }

            if ($key == "name") {

                if (is_numeric($value)) {
                    $this->Error  =   $this->Error . " name can't be a nummber! <br>";
                }
            }

            // if ($key == "password") {
            //     $password = $value;
            //     if ($key == "confirm_password") {
            //         $confirm_password = $value;
            //         if ($password != $confirm_password) {
            //             // $this->Error  =   $this->Error . " password and confirm password are not matching . <br>"; 
            //             echo  " password and confirm password are not matching . <br>"; 
            //         }
            //     }
            // }


            if ($key == "phone") {
                // if(is_string($value))
                // {
                //      $this->Error  =   $this->Error . " Phone no can't be a string ! <br>" ;
                // }
                if (strlen((string)$value) != 12) {
                    # code...
                    $this->Error  =   $this->Error . " Phone no should be 12 digets ! <br>";
                }
                if (strstr($value, " ")) {
                    $this->Error  =   $this->Error . " Phone no can't have a space! <br>";
                }
            }
        }

        if ($this->Error == "") {
            # code...
            //save data when no error

            $this->create_user($data);
        } else {
            echo "not insterted";

            return $this->Error;
        }
    }

    //create user
    public function create_user($data)
    {
        $name = ucfirst($data['name']);
        $email = $data['email'];
        $phone = $data['phone'];
        $password = $data['password'];
        $conn = new Connection();
        //check email exist or not
        //select query
        $sql = " SELECT  `email` FROM `user_table` WHERE email = '$email'";
        $result1 = $conn->read($sql);
        // echo "step2";
        //when same user id is not exist in the database
        if (!$result1) {
            // echo "your can try this.";
            // echo "step3";
            $query = "INSERT INTO `user_table` ( `name`, `email`, `phone`,  `role_id`, `password`)
            SELECT * FROM (SELECT '$name' AS name, '$email' AS email,'$phone' AS phone,'0'      AS role_id , '$password' AS password) AS tmp WHERE NOT EXISTS (SELECT email FROM user_table WHERE email = '$email') LIMIT 1";
            $result = $conn->save($query);
            if ($result) {
                return TRUE;
            } else {
                return false;
            }
        } else {
            //  echo "email is already exists .";
            return false;
        }
    }
}
