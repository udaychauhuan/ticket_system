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
        # query...
        $query ="INSERT INTO `user_table`( `name`, `email`, `phone`, `password`) VALUES ('$name','$email','$phone','$password')";
        $conn = new Connection();
        $result = $conn->save($query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
